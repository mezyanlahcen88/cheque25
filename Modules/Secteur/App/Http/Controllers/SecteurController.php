<?php

namespace Modules\Secteur\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Secteur\App\Http\Requests\StoreSecteurRequest;
use Modules\Secteur\App\Http\Requests\UpdateSecteurRequest;
use Modules\Secteur\App\Http\Datatable\SecteurDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Secteur\App\Models\Secteur;
use App\Http\Controllers\Controller;



class SecteurController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:secteur-list|secteur-create|secteur-edit|secteur-show|secteur-delete', ['only' => ['index']]);
        $this->middleware('permission:secteur-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:secteur-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:secteur-show', ['only' => ['show']]);
        $this->middleware('permission:secteur-delete', ['only' => ['destroy']]);
        $this->middleware('permission:secteur-restore', ['only' => ['restore']]);
        $this->middleware('permission:secteur-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:secteur-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:secteur-export', ['only' => ['trashed']]);
        $this->middleware('permission:secteur-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Secteur())->getRowsTable();
        $objects = Secteur::get();
          $columns = json_encode(Secteur::getColumns());
        return view('secteur::index',compact('tableRows','objects','columns'));
    }

     public function getSecteursJson()
    {
        $objects = Secteur::orderBy('created_at', 'desc');
        return SecteurDatatable::dataTable($objects);
    }


    public function getDeletedSecteursJson()
    {
        $objects = Secteur::onlyTrashed()->orderBy('deleted_at', 'desc');
        return SecteurDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Secteur::onlyTrashed()->get();
        $tableRows =(new Secteur())->getRowsTableTrashed();
         $columns = json_encode(Secteur::getTrashedColumns());
        return view('secteur::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('secteur::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSecteurRequest $request, Secteur $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'secteur', 'secteurs');

            return redirect()->route('secteur.index');

             } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('secteur.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('secteur.create')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('secteur.create')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('secteur.create')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = secteur::findOrfail($id);
        return view('secteur::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSecteurRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Secteur::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'secteur', 'secteurs');

            return redirect()->route('secteur.index');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('secteur.edit')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('secteur.edit')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('secteur.edit')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('secteur.edit')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Secteur::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted secteur.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Secteur::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('secteur.index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:secteurs,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Secteur::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.secteur_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.secteur_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:secteurs,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Secteur::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.secteur_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.secteur_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:secteurs,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $secteur = Secteur::find($id);
            $secteur->isactive = !$secteur->isactive;
            $secteur->save();
        }
        $activatedObjects = Secteur::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.secteur_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.secteur_message_fail_activate_multiple')]);
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

        $object = Secteur::withTrashed()->findOrFail($id);
        // deletePicture($object,'secteurs','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a secteur.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Secteur::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.secteur_message_activated') : trans('translation.secteur_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
