<?php

namespace Modules\Agency\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Agency\App\Http\Requests\StoreAgencyRequest;
use Modules\Agency\App\Http\Requests\UpdateAgencyRequest;
use Modules\Agency\App\Http\Datatable\AgencyDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Agency\App\Models\Agency;
use App\Http\Controllers\Controller;



class AgencyController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:agency-list|agency-create|agency-edit|agency-show|agency-delete', ['only' => ['index']]);
        $this->middleware('permission:agency-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:agency-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:agency-show', ['only' => ['show']]);
        $this->middleware('permission:agency-delete', ['only' => ['destroy']]);
        $this->middleware('permission:agency-restore', ['only' => ['restore']]);
        $this->middleware('permission:agency-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:agency-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:agency-export', ['only' => ['trashed']]);
        $this->middleware('permission:agency-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Agency())->getRowsTable();
        $objects = Agency::get();
          $columns = json_encode(Agency::getColumns());
        return view('agency::index',compact('tableRows','objects','columns'));
    }

     public function getAgenciesJson()
    {
        $objects = Agency::orderBy('created_at', 'desc');
        return AgencyDatatable::dataTable($objects);
    }


    public function getDeletedAgenciesJson()
    {
        $objects = Agency::onlyTrashed()->orderBy('deleted_at', 'desc');
        return AgencyDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Agency::onlyTrashed()->get();
        $tableRows =(new Agency())->getRowsTableTrashed();
         $columns = json_encode(Agency::getTrashedColumns());
        return view('agency::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('agency::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgencyRequest $request, Agency $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'agency', 'agencies');

            return redirect()->route('agency.index');

             } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('agency.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('agency.create')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('agency.create')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('agency.create')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = agency::findOrfail($id);
        return view('agency::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgencyRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Agency::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'agency', 'agencies');

            return redirect()->route('agency.index');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('agency.edit')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('agency.edit')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('agency.edit')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('agency.edit')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Agency::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted agency.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Agency::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('agency.index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:agencies,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Agency::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.agency_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.agency_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:agencies,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Agency::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.agency_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.agency_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:agencies,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $agency = Agency::find($id);
            $agency->isactive = !$agency->isactive;
            $agency->save();
        }
        $activatedObjects = Agency::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.agency_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.agency_message_fail_activate_multiple')]);
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

        $object = Agency::withTrashed()->findOrFail($id);
        // deletePicture($object,'agencies','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a agency.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Agency::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.agency_message_activated') : trans('translation.agency_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
