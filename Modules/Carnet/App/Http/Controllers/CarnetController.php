<?php

namespace Modules\Carnet\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Carnet\App\Http\Requests\StoreCarnetRequest;
use Modules\Carnet\App\Http\Requests\UpdateCarnetRequest;
use Modules\Carnet\App\Http\DataTable\CarnetDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Carnet\App\Models\Carnet;
use App\Http\Controllers\Controller;



class CarnetController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:carnet-list|carnet-create|carnet-edit|carnet-show|carnet-delete', ['only' => ['index']]);
        $this->middleware('permission:carnet-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:carnet-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:carnet-show', ['only' => ['show']]);
        $this->middleware('permission:carnet-delete', ['only' => ['destroy']]);
        $this->middleware('permission:carnet-restore', ['only' => ['restore']]);
        $this->middleware('permission:carnet-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:carnet-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:carnet-export', ['only' => ['trashed']]);
        $this->middleware('permission:carnet-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Carnet())->getRowsTable();
        $objects = Carnet::get();
          $columns = json_encode(Carnet::getColumns());
        return view('carnet::index',compact('tableRows','objects','columns'));
    }

     public function getCarnetsJson()
    {
        $objects = Carnet::orderBy('created_at', 'desc');
        return CarnetDataTable::dataTable($objects);
    }


    public function getDeletedCarnetsJson()
    {
        $objects = Carnet::onlyTrashed()->orderBy('deleted_at', 'desc');
        return CarnetDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Carnet::onlyTrashed()->get();
        $tableRows =(new Carnet())->getRowsTableTrashed();
         $columns = json_encode(Carnet::getTrashedColumns());
        return view('carnet::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('carnet::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarnetRequest $request, Carnet $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'carnet', 'carnets');

            return redirect()->route('carnet.index');
             } catch (ValidationException $e) {
            return redirect()->route('carnet::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = carnet::findOrfail($id);
        return view('carnet::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarnetRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Carnet::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'carnet', 'carnets');

            return redirect()->route('carnet.index');
            } catch (ValidationException $e) {
            return redirect()->route('carnet.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Carnet::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted carnet.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Carnet::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('carnet::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:carnets,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Carnet::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.carnet_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.carnet_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:carnets,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Carnet::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.carnet_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.carnet_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:carnets,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $carnet = Carnet::find($id);
            $carnet->isactive = !$carnet->isactive;
            $carnet->save();
        }
        $activatedObjects = Carnet::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.carnet_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.carnet_message_fail_activate_multiple')]);
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

        $object = Carnet::withTrashed()->findOrFail($id);
        // deletePicture($object,'carnets','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a carnet.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Carnet::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.carnet_message_activated') : trans('translation.carnet_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
