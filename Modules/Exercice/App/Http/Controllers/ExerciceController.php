<?php

namespace Modules\Exercice\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Exercice\App\Http\Requests\StoreExerciceRequest;
use Modules\Exercice\App\Http\Requests\UpdateExerciceRequest;
use Modules\Exercice\App\Http\DataTable\ExerciceDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Exercice\App\Models\Exercice;
use App\Http\Controllers\Controller;



class ExerciceController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:exercice-list|exercice-create|exercice-edit|exercice-show|exercice-delete', ['only' => ['index']]);
        $this->middleware('permission:exercice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exercice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exercice-show', ['only' => ['show']]);
        $this->middleware('permission:exercice-delete', ['only' => ['destroy']]);
        $this->middleware('permission:exercice-restore', ['only' => ['restore']]);
        $this->middleware('permission:exercice-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:exercice-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:exercice-export', ['only' => ['trashed']]);
        $this->middleware('permission:exercice-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Exercice())->getRowsTable();
        $objects = Exercice::get();
          $columns = json_encode(Exercice::getColumns());
        return view('exercice::index',compact('tableRows','objects','columns'));
    }

     public function getExercicesJson()
    {
        $objects = Exercice::orderBy('created_at', 'desc');
        return ExerciceDataTable::dataTable($objects);
    }


    public function getDeletedExercicesJson()
    {
        $objects = Exercice::onlyTrashed()->orderBy('deleted_at', 'desc');
        return ExerciceDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Exercice::onlyTrashed()->get();
        $tableRows =(new Exercice())->getRowsTableTrashed();
         $columns = json_encode(Exercice::getTrashedColumns());
        return view('exercice::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('exercice::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciceRequest $request, Exercice $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'exercice', 'exercices');

            return redirect()->route('exercice.index');
             } catch (ValidationException $e) {
            return redirect()->route('exercice::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = exercice::findOrfail($id);
        return view('exercice::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciceRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Exercice::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'exercice', 'exercices');

            return redirect()->route('exercice.index');
            } catch (ValidationException $e) {
            return redirect()->route('exercice.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Exercice::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted exercice.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Exercice::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('exercice::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:exercices,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Exercice::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.exercice_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.exercice_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:exercices,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Exercice::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.exercice_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.exercice_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:exercices,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $exercice = Exercice::find($id);
            $exercice->isactive = !$exercice->isactive;
            $exercice->save();
        }
        $activatedObjects = Exercice::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.exercice_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.exercice_message_fail_activate_multiple')]);
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

        $object = Exercice::withTrashed()->findOrFail($id);
        // deletePicture($object,'exercices','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a exercice.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Exercice::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.exercice_message_activated') : trans('translation.exercice_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
