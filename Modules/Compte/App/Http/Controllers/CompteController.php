<?php

namespace Modules\Compte\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Compte\App\Http\Requests\StoreCompteRequest;
use Modules\Compte\App\Http\Requests\UpdateCompteRequest;
use Modules\Compte\App\Http\DataTable\CompteDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Compte\App\Models\Compte;
use App\Http\Controllers\Controller;



class CompteController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:compte-list|compte-create|compte-edit|compte-show|compte-delete', ['only' => ['index']]);
        $this->middleware('permission:compte-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:compte-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:compte-show', ['only' => ['show']]);
        $this->middleware('permission:compte-delete', ['only' => ['destroy']]);
        $this->middleware('permission:compte-restore', ['only' => ['restore']]);
        $this->middleware('permission:compte-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:compte-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:compte-export', ['only' => ['trashed']]);
        $this->middleware('permission:compte-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Compte())->getRowsTable();
        $objects = Compte::get();
          $columns = json_encode(Compte::getColumns());
        return view('compte::index',compact('tableRows','objects','columns'));
    }

     public function getComptesJson()
    {
        $objects = Compte::orderBy('created_at', 'desc');
        return CompteDataTable::dataTable($objects);
    }


    public function getDeletedComptesJson()
    {
        $objects = Compte::onlyTrashed()->orderBy('deleted_at', 'desc');
        return CompteDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Compte::onlyTrashed()->get();
        $tableRows =(new Compte())->getRowsTableTrashed();
         $columns = json_encode(Compte::getTrashedColumns());
        return view('compte::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('compte::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompteRequest $request, Compte $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'compte', 'comptes');

            return redirect()->route('compte.index');
             } catch (ValidationException $e) {
            return redirect()->route('compte::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = compte::findOrfail($id);
        return view('compte::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompteRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Compte::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'compte', 'comptes');

            return redirect()->route('compte.index');
            } catch (ValidationException $e) {
            return redirect()->route('compte.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Compte::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted compte.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Compte::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('compte::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:comptes,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Compte::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.compte_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.compte_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:comptes,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Compte::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.compte_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.compte_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:comptes,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $compte = Compte::find($id);
            $compte->isactive = !$compte->isactive;
            $compte->save();
        }
        $activatedObjects = Compte::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.compte_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.compte_message_fail_activate_multiple')]);
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

        $object = Compte::withTrashed()->findOrFail($id);
        // deletePicture($object,'comptes','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a compte.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Compte::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.compte_message_activated') : trans('translation.compte_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
