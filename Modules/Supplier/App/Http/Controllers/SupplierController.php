<?php

namespace Modules\Supplier\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Supplier\App\Http\Requests\StoreSupplierRequest;
use Modules\Supplier\App\Http\Requests\UpdateSupplierRequest;
use Modules\Supplier\App\Http\DataTable\SupplierDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Supplier\App\Models\Supplier;
use App\Http\Controllers\Controller;



class SupplierController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:supplier-list|supplier-create|supplier-edit|supplier-show|supplier-delete', ['only' => ['index']]);
        $this->middleware('permission:supplier-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:supplier-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:supplier-show', ['only' => ['show']]);
        $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
        $this->middleware('permission:supplier-restore', ['only' => ['restore']]);
        $this->middleware('permission:supplier-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:supplier-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:supplier-export', ['only' => ['trashed']]);
        $this->middleware('permission:supplier-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Supplier())->getRowsTable();
        $objects = Supplier::get();
          $columns = json_encode(Supplier::getColumns());
        return view('supplier::index',compact('tableRows','objects','columns'));
    }

     public function getSuppliersJson()
    {
        $objects = Supplier::orderBy('created_at', 'desc');
        return SupplierDataTable::dataTable($objects);
    }


    public function getDeletedSuppliersJson()
    {
        $objects = Supplier::onlyTrashed()->orderBy('deleted_at', 'desc');
        return SupplierDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Supplier::onlyTrashed()->get();
        $tableRows =(new Supplier())->getRowsTableTrashed();
         $columns = json_encode(Supplier::getTrashedColumns());
        return view('supplier::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('supplier::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request, Supplier $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'supplier', 'suppliers');

            return redirect()->route('supplier.index');
             } catch (ValidationException $e) {
            return redirect()->route('supplier::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = supplier::findOrfail($id);
        return view('supplier::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Supplier::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'supplier', 'suppliers');

            return redirect()->route('supplier.index');
            } catch (ValidationException $e) {
            return redirect()->route('supplier.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Supplier::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted supplier.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Supplier::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('supplier::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:suppliers,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Supplier::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.supplier_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.supplier_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:suppliers,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Supplier::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.supplier_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.supplier_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:suppliers,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $supplier = Supplier::find($id);
            $supplier->isactive = !$supplier->isactive;
            $supplier->save();
        }
        $activatedObjects = Supplier::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.supplier_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.supplier_message_fail_activate_multiple')]);
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

        $object = Supplier::withTrashed()->findOrFail($id);
        // deletePicture($object,'suppliers','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a supplier.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Supplier::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.supplier_message_activated') : trans('translation.supplier_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
