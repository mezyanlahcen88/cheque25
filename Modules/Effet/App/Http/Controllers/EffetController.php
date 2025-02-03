<?php

namespace Modules\Effet\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Effet\App\Http\Requests\StoreEffetRequest;
use Modules\Effet\App\Http\Requests\UpdateEffetRequest;
use Modules\Effet\App\Http\DataTable\EffetDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Effet\App\Models\Effet;
use App\Http\Controllers\Controller;



class EffetController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:effet-list|effet-create|effet-edit|effet-show|effet-delete', ['only' => ['index']]);
        $this->middleware('permission:effet-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:effet-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:effet-show', ['only' => ['show']]);
        $this->middleware('permission:effet-delete', ['only' => ['destroy']]);
        $this->middleware('permission:effet-restore', ['only' => ['restore']]);
        $this->middleware('permission:effet-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:effet-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:effet-export', ['only' => ['trashed']]);
        $this->middleware('permission:effet-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Effet())->getRowsTable();
        $objects = Effet::get();
          $columns = json_encode(Effet::getColumns());
        return view('effet::index',compact('tableRows','objects','columns'));
    }

     public function getEffetsJson()
    {
        $objects = Effet::orderBy('created_at', 'desc');
        return EffetDataTable::dataTable($objects);
    }


    public function getDeletedEffetsJson()
    {
        $objects = Effet::onlyTrashed()->orderBy('deleted_at', 'desc');
        return EffetDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Effet::onlyTrashed()->get();
        $tableRows =(new Effet())->getRowsTableTrashed();
         $columns = json_encode(Effet::getTrashedColumns());
        return view('effet::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('effet::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEffetRequest $request, Effet $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'effet', 'effets');

            return redirect()->route('effet.index');
             } catch (ValidationException $e) {
            return redirect()->route('effet::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Effet  $effet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = effet::findOrfail($id);
        return view('effet::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Effet  $effet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEffetRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Effet::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'effet', 'effets');

            return redirect()->route('effet.index');
            } catch (ValidationException $e) {
            return redirect()->route('effet.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Effet  $effet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Effet::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted effet.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Effet::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('effet::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:effets,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Effet::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.effet_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.effet_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:effets,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Effet::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.effet_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.effet_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:effets,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $effet = Effet::find($id);
            $effet->isactive = !$effet->isactive;
            $effet->save();
        }
        $activatedObjects = Effet::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.effet_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.effet_message_fail_activate_multiple')]);
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

        $object = Effet::withTrashed()->findOrFail($id);
        // deletePicture($object,'effets','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a effet.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Effet::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.effet_message_activated') : trans('translation.effet_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
