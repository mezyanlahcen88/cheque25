<?php

namespace Modules\Cheque\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Cheque\App\Http\Requests\StoreChequeRequest;
use Modules\Cheque\App\Http\Requests\UpdateChequeRequest;
use Modules\Cheque\App\Http\DataTable\ChequeDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Cheque\App\Models\Cheque;
use App\Http\Controllers\Controller;



class ChequeController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:cheque-list|cheque-create|cheque-edit|cheque-show|cheque-delete', ['only' => ['index']]);
        $this->middleware('permission:cheque-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cheque-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cheque-show', ['only' => ['show']]);
        $this->middleware('permission:cheque-delete', ['only' => ['destroy']]);
        $this->middleware('permission:cheque-restore', ['only' => ['restore']]);
        $this->middleware('permission:cheque-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:cheque-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:cheque-export', ['only' => ['trashed']]);
        $this->middleware('permission:cheque-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Cheque())->getRowsTable();
        $objects = Cheque::get();
          $columns = json_encode(Cheque::getColumns());
        return view('cheque::index',compact('tableRows','objects','columns'));
    }

     public function getChequesJson()
    {
        $objects = Cheque::orderBy('created_at', 'desc');
        return ChequeDataTable::dataTable($objects);
    }


    public function getDeletedChequesJson()
    {
        $objects = Cheque::onlyTrashed()->orderBy('deleted_at', 'desc');
        return ChequeDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Cheque::onlyTrashed()->get();
        $tableRows =(new Cheque())->getRowsTableTrashed();
         $columns = json_encode(Cheque::getTrashedColumns());
        return view('cheque::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cheque::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChequeRequest $request, Cheque $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'cheque', 'cheques');

            return redirect()->route('cheque.index');
             } catch (ValidationException $e) {
            return redirect()->route('cheque::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cheque  $cheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = cheque::findOrfail($id);
        return view('cheque::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cheque  $cheque
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChequeRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Cheque::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'cheque', 'cheques');

            return redirect()->route('cheque.index');
            } catch (ValidationException $e) {
            return redirect()->route('cheque.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cheque  $cheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Cheque::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted cheque.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Cheque::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('cheque::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:cheques,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Cheque::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.cheque_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.cheque_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:cheques,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Cheque::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.cheque_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.cheque_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:cheques,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $cheque = Cheque::find($id);
            $cheque->isactive = !$cheque->isactive;
            $cheque->save();
        }
        $activatedObjects = Cheque::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.cheque_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.cheque_message_fail_activate_multiple')]);
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

        $object = Cheque::withTrashed()->findOrFail($id);
        // deletePicture($object,'cheques','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a cheque.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Cheque::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.cheque_message_activated') : trans('translation.cheque_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
