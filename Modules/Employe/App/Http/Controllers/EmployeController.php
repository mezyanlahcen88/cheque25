<?php

namespace Modules\Employe\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Employe\App\Http\Requests\StoreEmployeRequest;
use Modules\Employe\App\Http\Requests\UpdateEmployeRequest;
use Modules\Employe\App\Http\DataTable\EmployeDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Employe\App\Models\Employe;
use App\Http\Controllers\Controller;



class EmployeController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:employe-list|employe-create|employe-edit|employe-show|employe-delete', ['only' => ['index']]);
        $this->middleware('permission:employe-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employe-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employe-show', ['only' => ['show']]);
        $this->middleware('permission:employe-delete', ['only' => ['destroy']]);
        $this->middleware('permission:employe-restore', ['only' => ['restore']]);
        $this->middleware('permission:employe-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:employe-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:employe-export', ['only' => ['trashed']]);
        $this->middleware('permission:employe-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Employe())->getRowsTable();
        $objects = Employe::get();
          $columns = json_encode(Employe::getColumns());
        return view('employe::index',compact('tableRows','objects','columns'));
    }

     public function getEmployesJson()
    {
        $objects = Employe::orderBy('created_at', 'desc');
        return EmployeDataTable::dataTable($objects);
    }


    public function getDeletedEmployesJson()
    {
        $objects = Employe::onlyTrashed()->orderBy('deleted_at', 'desc');
        return EmployeDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Employe::onlyTrashed()->get();
        $tableRows =(new Employe())->getRowsTableTrashed();
         $columns = json_encode(Employe::getTrashedColumns());
        return view('employe::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('employe::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeRequest $request, Employe $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'employe', 'employes');

            return redirect()->route('employe.index');
             } catch (ValidationException $e) {
            return redirect()->route('employe::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = employe::findOrfail($id);
        return view('employe::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Employe::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'employe', 'employes');

            return redirect()->route('employe.index');
            } catch (ValidationException $e) {
            return redirect()->route('employe.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Employe::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted employe.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Employe::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('employe::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:employes,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Employe::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.employe_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.employe_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:employes,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Employe::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.employe_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.employe_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:employes,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $employe = Employe::find($id);
            $employe->isactive = !$employe->isactive;
            $employe->save();
        }
        $activatedObjects = Employe::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.employe_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.employe_message_fail_activate_multiple')]);
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

        $object = Employe::withTrashed()->findOrFail($id);
        // deletePicture($object,'employes','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a employe.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Employe::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.employe_message_activated') : trans('translation.employe_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
