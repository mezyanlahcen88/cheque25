<?php

namespace Modules\Client\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Client\App\Http\Requests\StoreClientRequest;
use Modules\Client\App\Http\Requests\UpdateClientRequest;
use Modules\Client\App\Http\DataTable\ClientDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Client\App\Models\Client;
use App\Http\Controllers\Controller;



class ClientController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:client-list|client-create|client-edit|client-show|client-delete', ['only' => ['index']]);
        $this->middleware('permission:client-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:client-show', ['only' => ['show']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
        $this->middleware('permission:client-restore', ['only' => ['restore']]);
        $this->middleware('permission:client-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:client-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:client-export', ['only' => ['trashed']]);
        $this->middleware('permission:client-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Client())->getRowsTable();
        $objects = Client::get();
          $columns = json_encode(Client::getColumns());
        return view('client::index',compact('tableRows','objects','columns'));
    }

     public function getClientsJson()
    {
        $objects = Client::orderBy('created_at', 'desc');
        return ClientDataTable::dataTable($objects);
    }


    public function getDeletedClientsJson()
    {
        $objects = Client::onlyTrashed()->orderBy('deleted_at', 'desc');
        return ClientDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Client::onlyTrashed()->get();
        $tableRows =(new Client())->getRowsTableTrashed();
         $columns = json_encode(Client::getTrashedColumns());
        return view('client::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('client::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request, Client $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'client', 'clients');
            if (strpos($request->ref, getPrefix('Client')) !== false) {
                incClientNumerotation();
            }
            return redirect()->route('client.index');
             } catch (ValidationException $e) {
            return redirect()->route('client::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = client::findOrfail($id);
        return view('client::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Client::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'client', 'clients');

            return redirect()->route('client.index');
            } catch (ValidationException $e) {
            return redirect()->route('client.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Client::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted client.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Client::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('client::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:clients,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Client::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.client_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.client_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:clients,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Client::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.client_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.client_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:clients,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $client = Client::find($id);
            $client->isactive = !$client->isactive;
            $client->save();
        }
        $activatedObjects = Client::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.client_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.client_message_fail_activate_multiple')]);
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

        $object = Client::withTrashed()->findOrFail($id);
        // deletePicture($object,'clients','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a client.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Client::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.client_message_activated') : trans('translation.client_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
