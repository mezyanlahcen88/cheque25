<?php

namespace Modules\Numerotation\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Numerotation\App\Http\Requests\StoreNumerotationRequest;
use Modules\Numerotation\App\Http\Requests\UpdateNumerotationRequest;
use Modules\Numerotation\App\Http\DataTable\NumerotationDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Numerotation\App\Models\Numerotation;
use App\Http\Controllers\Controller;



class NumerotationController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:numerotation-list|numerotation-create|numerotation-edit|numerotation-show|numerotation-delete', ['only' => ['index']]);
        $this->middleware('permission:numerotation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:numerotation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:numerotation-show', ['only' => ['show']]);
        $this->middleware('permission:numerotation-delete', ['only' => ['destroy']]);
        $this->middleware('permission:numerotation-restore', ['only' => ['restore']]);
        $this->middleware('permission:numerotation-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:numerotation-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:numerotation-export', ['only' => ['trashed']]);
        $this->middleware('permission:numerotation-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Numerotation())->getRowsTable();
        $objects = Numerotation::get();
          $columns = json_encode(Numerotation::getColumns());
        return view('numerotation::index',compact('tableRows','objects','columns'));
    }

     public function getNumerotationsJson()
    {
        $objects = Numerotation::orderBy('created_at', 'desc');
        return NumerotationDataTable::dataTable($objects);
    }


    public function getDeletedNumerotationsJson()
    {
        $objects = Numerotation::onlyTrashed()->orderBy('deleted_at', 'desc');
        return NumerotationDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Numerotation::onlyTrashed()->get();
        $tableRows =(new Numerotation())->getRowsTableTrashed();
         $columns = json_encode(Numerotation::getTrashedColumns());
        return view('numerotation::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('numerotation::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumerotationRequest $request, Numerotation $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'numerotation', 'numerotations');

            return redirect()->route('numerotation.index');
             } catch (ValidationException $e) {
            return redirect()->route('numerotation::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = numerotation::findOrfail($id);
        return view('numerotation::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumerotationRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Numerotation::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'numerotation', 'numerotations');

            return redirect()->route('numerotation.index');
            } catch (ValidationException $e) {
            return redirect()->route('numerotation.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Numerotation::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted numerotation.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Numerotation::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('numerotation::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:numerotations,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Numerotation::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.numerotation_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.numerotation_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:numerotations,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Numerotation::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.numerotation_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.numerotation_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:numerotations,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $numerotation = Numerotation::find($id);
            $numerotation->isactive = !$numerotation->isactive;
            $numerotation->save();
        }
        $activatedObjects = Numerotation::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.numerotation_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.numerotation_message_fail_activate_multiple')]);
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

        $object = Numerotation::withTrashed()->findOrFail($id);
        // deletePicture($object,'numerotations','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a numerotation.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Numerotation::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.numerotation_message_activated') : trans('translation.numerotation_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
