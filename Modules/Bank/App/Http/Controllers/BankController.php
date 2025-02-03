<?php

namespace Modules\Bank\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Bank\App\Http\Requests\StoreBankRequest;
use Modules\Bank\App\Http\Requests\UpdateBankRequest;
use Modules\Bank\App\Http\DataTable\BankDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Bank\App\Models\Bank;
use App\Http\Controllers\Controller;



class BankController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:bank-list|bank-create|bank-edit|bank-show|bank-delete', ['only' => ['index']]);
        $this->middleware('permission:bank-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:bank-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bank-show', ['only' => ['show']]);
        $this->middleware('permission:bank-delete', ['only' => ['destroy']]);
        $this->middleware('permission:bank-restore', ['only' => ['restore']]);
        $this->middleware('permission:bank-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:bank-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:bank-export', ['only' => ['trashed']]);
        $this->middleware('permission:bank-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Bank())->getRowsTable();
        $objects = Bank::get();
          $columns = json_encode(Bank::getColumns());
        return view('bank::index',compact('tableRows','objects','columns'));
    }

     public function getBanksJson()
    {
        $objects = Bank::orderBy('created_at', 'desc');
        return BankDataTable::dataTable($objects);
    }


    public function getDeletedBanksJson()
    {
        $objects = Bank::onlyTrashed()->orderBy('deleted_at', 'desc');
        return BankDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Bank::onlyTrashed()->get();
        $tableRows =(new Bank())->getRowsTableTrashed();
         $columns = json_encode(Bank::getTrashedColumns());
        return view('bank::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('bank::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankRequest $request, Bank $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'bank', 'banks');

            return redirect()->route('bank.index');
             } catch (ValidationException $e) {
            return redirect()->route('bank::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = bank::findOrfail($id);
        return view('bank::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Bank::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'bank', 'banks');

            return redirect()->route('bank.index');
            } catch (ValidationException $e) {
            return redirect()->route('bank.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Bank::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted bank.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Bank::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('bank::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:banks,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Bank::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.bank_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.bank_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:banks,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Bank::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.bank_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.bank_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:banks,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $bank = Bank::find($id);
            $bank->isactive = !$bank->isactive;
            $bank->save();
        }
        $activatedObjects = Bank::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.bank_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.bank_message_fail_activate_multiple')]);
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

        $object = Bank::withTrashed()->findOrFail($id);
        // deletePicture($object,'banks','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a bank.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Bank::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.bank_message_activated') : trans('translation.bank_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
