<?php

namespace Modules\State\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\State\App\Http\Requests\StoreStateRequest;
use Modules\State\App\Http\Requests\UpdateStateRequest;
use Modules\State\App\Http\Datatable\StateDatatable;
use Illuminate\Validation\ValidationException;
use Modules\State\App\Models\State;
use App\Http\Controllers\Controller;



class StateController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:state-list|state-create|state-edit|state-show|state-delete', ['only' => ['index']]);
        $this->middleware('permission:state-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:state-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:state-show', ['only' => ['show']]);
        $this->middleware('permission:state-delete', ['only' => ['destroy']]);
        $this->middleware('permission:state-restore', ['only' => ['restore']]);
        $this->middleware('permission:state-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:state-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:state-export', ['only' => ['trashed']]);
        $this->middleware('permission:state-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new State())->getRowsTable();
        $objects = State::get();
        $columns = json_encode(State::getColumns());
        return view('state::index',compact('tableRows','objects','columns'));
    }

     public function getStatesJson()
    {
        $objects = State::orderBy('created_at','desc')->get();
        return StateDatatable::dataTable($objects);
    }


    public function getDeletedStatesJson()
    {
        $objects = State::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return StateDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = State::onlyTrashed()->get();
        $tableRows =(new State())->getRowsTableTrashed();
        $columns = json_encode(State::getTrashedColumns());
        return view('state::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('state::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request, State $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'state', 'states');

            return redirect()->route('state.index');
             } catch (ValidationException $e) {
            return redirect()->route('state::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = state::findOrfail($id);
        return view('state::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = State::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'state', 'states');

            return redirect()->route('state.index');
            } catch (ValidationException $e) {
            return redirect()->route('state.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = State::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted state.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = State::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('state::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:states,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = State::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.state_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.state_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:states,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = State::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.state_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.state_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:states,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $state = State::find($id);
            $state->isactive = !$state->isactive;
            $state->save();
        }
        $activatedObjects = State::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.state_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.state_message_fail_activate_multiple')]);
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

        $object = State::withTrashed()->findOrFail($id);
        // deletePicture($object,'states','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a state.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = State::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.state_message_activated') : trans('translation.state_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
