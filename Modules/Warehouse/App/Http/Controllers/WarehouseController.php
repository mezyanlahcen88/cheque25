<?php

namespace Modules\Warehouse\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Warehouse\App\Http\Requests\StoreWarehouseRequest;
use Modules\Warehouse\App\Http\Requests\UpdateWarehouseRequest;
use Modules\Warehouse\App\Http\Datatable\WarehouseDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Warehouse\App\Models\Warehouse;
use App\Http\Controllers\Controller;



class WarehouseController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:warehouse-list|warehouse-create|warehouse-edit|warehouse-show|warehouse-delete', ['only' => ['index']]);
        $this->middleware('permission:warehouse-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:warehouse-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:warehouse-show', ['only' => ['show']]);
        $this->middleware('permission:warehouse-delete', ['only' => ['destroy']]);
        $this->middleware('permission:warehouse-restore', ['only' => ['restore']]);
        $this->middleware('permission:warehouse-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:warehouse-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:warehouse-export', ['only' => ['trashed']]);
        $this->middleware('permission:warehouse-multiple-delete', ['only' => ['deleteMultiple']]);
        $this->staticOptions = $staticOptions;
        $this->crudService = $crudService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tableRows =(new Warehouse())->getRowsTable();
        $objects = Warehouse::get();
          $columns = json_encode(Warehouse::getColumns());
        return view('warehouse::index',compact('tableRows','objects','columns'));
    }

     public function getWarehousesJson()
    {
        $objects = Warehouse::orderBy('created_at', 'desc');
        return WarehouseDatatable::dataTable($objects);
    }


    public function getDeletedWarehousesJson()
    {
        $objects = Warehouse::onlyTrashed()->orderBy('deleted_at', 'desc');
        return WarehouseDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Warehouse::onlyTrashed()->get();
        $tableRows =(new Warehouse())->getRowsTableTrashed();
         $columns = json_encode(Warehouse::getTrashedColumns());
        return view('warehouse::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('warehouse::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarehouseRequest $request, Warehouse $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'warehouse', 'warehouses');

            return redirect()->route('warehouse.index');

             } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('warehouse.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('warehouse.create')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('warehouse.create')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('warehouse.create')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = warehouse::findOrfail($id);
        return view('warehouse::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWarehouseRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Warehouse::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'warehouse', 'warehouses');

            return redirect()->route('warehouse.index');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('warehouse.edit')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('warehouse.edit')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('warehouse.edit')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('warehouse.edit')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Warehouse::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted warehouse.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Warehouse::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('warehouse.index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:warehouses,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Warehouse::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.warehouse_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.warehouse_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:warehouses,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Warehouse::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.warehouse_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.warehouse_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:warehouses,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $warehouse = Warehouse::find($id);
            $warehouse->isactive = !$warehouse->isactive;
            $warehouse->save();
        }
        $activatedObjects = Warehouse::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.warehouse_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.warehouse_message_fail_activate_multiple')]);
        }
    }
    /**
     * Force delete a record permanently.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the record to force delete.
     * @return void
     */
    public function forceDelete(Request $request, $id)
    {

        $object = Warehouse::withTrashed()->findOrFail($id);
        // deletePicture($object,'warehouses','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a warehouse.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Warehouse::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.warehouse_message_activated') : trans('translation.warehouse_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
