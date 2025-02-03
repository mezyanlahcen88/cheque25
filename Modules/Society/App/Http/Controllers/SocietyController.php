<?php

namespace Modules\Society\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Society\App\Http\Requests\StoreSocietyRequest;
use Modules\Society\App\Http\Requests\UpdateSocietyRequest;
use Modules\Society\App\Http\DataTable\SocietyDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Society\App\Models\Society;
use App\Http\Controllers\Controller;



class SocietyController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:society-list|society-create|society-edit|society-show|society-delete', ['only' => ['index']]);
        $this->middleware('permission:society-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:society-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:society-show', ['only' => ['show']]);
        $this->middleware('permission:society-delete', ['only' => ['destroy']]);
        $this->middleware('permission:society-restore', ['only' => ['restore']]);
        $this->middleware('permission:society-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:society-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:society-export', ['only' => ['trashed']]);
        $this->middleware('permission:society-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Society())->getRowsTable();
        $objects = Society::get();
          $columns = json_encode(Society::getColumns());
        return view('society::index',compact('tableRows','objects','columns'));
    }

     public function getSocietiesJson()
    {
        $objects = Society::orderBy('created_at', 'desc');
        return SocietyDataTable::dataTable($objects);
    }


    public function getDeletedSocietiesJson()
    {
        $objects = Society::onlyTrashed()->orderBy('deleted_at', 'desc');
        return SocietyDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Society::onlyTrashed()->get();
        $tableRows =(new Society())->getRowsTableTrashed();
         $columns = json_encode(Society::getTrashedColumns());
        return view('society::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('society::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocietyRequest $request, Society $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'society', 'societies');

            return redirect()->route('society.index');
             } catch (ValidationException $e) {
            return redirect()->route('society::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = society::findOrfail($id);
        return view('society::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocietyRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Society::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'society', 'societies');

            return redirect()->route('society.index');
            } catch (ValidationException $e) {
            return redirect()->route('society.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Society::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted society.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Society::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('society::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:societies,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Society::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.society_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.society_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:societies,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Society::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.society_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.society_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:societies,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $society = Society::find($id);
            $society->isactive = !$society->isactive;
            $society->save();
        }
        $activatedObjects = Society::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.society_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.society_message_fail_activate_multiple')]);
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

        $object = Society::withTrashed()->findOrFail($id);
        // deletePicture($object,'societies','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a society.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Society::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.society_message_activated') : trans('translation.society_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
