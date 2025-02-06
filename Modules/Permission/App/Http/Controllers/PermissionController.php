<?php

namespace Modules\Permission\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Permission\App\Models\Permission;
use Illuminate\Validation\ValidationException;
use Modules\Permission\App\Http\Datatable\PermissionDatatable;
use Modules\Permission\App\Http\Requests\StorePermissionRequest;
use Modules\Permission\App\Http\Requests\UpdatePermissionRequest;



class PermissionController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-show|permission-delete', ['only' => ['index']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-show', ['only' => ['show']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
        $this->middleware('permission:permission-restore', ['only' => ['restore']]);
        $this->middleware('permission:permission-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:permission-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:permission-export', ['only' => ['trashed']]);
        $this->middleware('permission:permission-multiple-delete', ['only' => ['deleteMultiple']]);
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

          $tableRows =(new Permission())->getRowsTable();
          $objects = Permission::get();
          $columns = json_encode(Permission::getColumns());
        return view('permission::index',compact('tableRows','objects','columns'));
    }

     public function getPermissionsJson()
    {
        $objects = Permission::orderBy('created_at','desc');
        return PermissionDatatable::dataTable($objects);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('permission::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request, Permission $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'permission', 'permissions');

            return redirect()->route('permission.index');
             } catch (ValidationException $e) {
            return redirect()->route('permission::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = permission::findOrfail($id);
        return view('permission::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Permission::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'permission', 'permissions');

            return redirect()->route('permission.index');
            } catch (ValidationException $e) {
            return redirect()->route('permission.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Permission::findOrFail($request->id)->delete();

    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:permissions,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Permission::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.permission_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.permission_message_fail_delete_multiple')]);
        }
    }

            /**
     * Restore a soft-deleted user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    // public function restore(Request $request, $id)
    // {

    //     $object = Permission::withTrashed()->findOrFail($id)->restore();

    //     return redirect()->route('permission::index');
    // }

    /**
     * Force delete a record permanently.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the record to force delete.
     * @return void
     */
    // public function forceDelete(Request $request, $id)
    // {

    //     $object = Permission::withTrashed()->findOrFail($id);
    //     // deletePicture($object,'permissions','picture');
    //     $object->forceDelete();

    // }


}
