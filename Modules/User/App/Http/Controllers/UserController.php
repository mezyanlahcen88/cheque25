<?php

namespace Modules\User\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\User\app\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Modules\User\App\Http\DataTable\UserDataTable;
use Modules\User\App\Http\Requests\StoreUserRequest;
use Modules\User\App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-show|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-restore', ['only' => ['restore']]);
        $this->middleware('permission:user-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:user-export', ['only' => ['trashed']]);
        $this->middleware('permission:user-multiple-delete', ['only' => ['deleteMultiple']]);
        $this->middleware('permission:user-force-delete', ['only' => ['forceDelete']]);
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
        $tableRows = User::getRowsTable();
            $objects = User::get();
        $columns = json_encode(User::getColumns());
        return view('user::user.index', compact('tableRows', 'objects', 'columns'));
    }

    public function getUsersJson()
    {
        $objects = User::orderBy('deleted_at', 'desc');
        return UserDataTable::dataTable($objects);
    }

    public function getDeletedUsersJson()
    {
        $objects = User::onlyTrashed()->orderBy('deleted_at', 'desc');
        return UserDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = User::onlyTrashed()->get();
        $tableRows = (new User())->getRowsTableTrashed();
        $columns = json_encode(User::getTrashedColumns());
        return view('user::user.trashedIndex', compact('tableRows', 'objects', 'columns'));
    }

    public function profile()
    {
        $object = User::where('uuid', Auth::user()->uuid)->first();
        return view('user::user.edit', compact('object'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user::user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, User $model)
    {
        try {
            $validated = $request->validated();

            $request['password'] = Hash::make($request->password);

            $object = $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'user', 'users');

            return redirect()->route('user.index');
        } catch (ValidationException $e) {
            return redirect()
                ->route('user::create')
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $object = user::where('uuid', $uuid)->first();
        return view('user::user.show', compact('object'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid, $tab)
    {
        $object = user::where('uuid', $uuid)->first();
        return view('user::user.edit', compact('object', 'tab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $object = User::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'user', 'users');

            return redirect()->route('user.index');
        } catch (ValidationException $e) {
            return redirect()
                ->route('user.edit')
                ->withErrors($e->validator)
                ->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = User::whereUuid($request->id)
            ->first()
            ->delete();
    }


    /**
     * Restore a soft-deleted user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {
        $object = User::withTrashed()->whereUuid($id)->first()->restore();

        return redirect()->route('user.index');
    }
    public function deleteMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:users,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = User::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.user_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.user_message_fail_delete_multiple')]);
        }
    }

    public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:users,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = User::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.user_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.user_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:users,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $user = User::find($id);
            $user->isactive = !$user->isactive;
            $user->save();
        }
        $activatedObjects = User::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.user_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.user_message_fail_activate_multiple')]);
        }
    }
    /**
     * Force delete a record permanently.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the record to force delete.
     * @return void
     */
    public function forceDelete(Request $request, $uuid)
    {
        $object = User::withTrashed()->whereUuid($uuid);
        deletePicture($object, 'users', 'picture');
        $object->forceDelete();
    }

    /**
     * Change the status (active/inactive) of a user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = User::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.user_message_activated') : trans('translation.user_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->isactive, 'message' => $message]);
    }

    public function updateOverview(Request $request, $uuid)
    {
        $validator = Validator::make($request->all(), User::OVERVIEW_RULES);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $object = User::whereUuid($uuid)->first();
        $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'user', 'users');

        $message = trans('translation.user_message_overview');
        return response()->json(['success' => true, 'message' => $message]);
    }
    /**
     * Update the user's password.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function updatePassword(Request $request, $uuid)
    {
        $validator = Validator::make($request->all(), User::PASSWORD_RULES);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $object = User::whereUuid($uuid)->first();
        if (!Hash::check($request->old_password, $object->password)) {
            $message = trans('translation.user_message_current_password_error');
            return response()->json(['success' => false, 'message' => $message]);
        }
        $object->password = Hash::make($request->new_password);
        $object->save();
        $message = trans('translation.user_message_password');
        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Update the user's email and role.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function updateEmailRole(Request $request, $uuid)
    {
        $validator = Validator::make($request->all(), User::EMAIL_RULES);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $object = User::whereUuid($uuid)->first();
        $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'user', 'users');
        // $object->assignRole($request->roles_name,'web');
        $message = trans('translation.user_message_update_email_role');
        return response()->json(['success' => true, 'message' => $message]);
    }
    /**
     * Update the user's profile picture.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function updatePicture(Request $request, $uuid)
    {
        $object = User::whereUuid($uuid)->first();
        if ($request->hasFile('picture')) {
            dealWithPicture($request, $object, 'picture', $object->first_name, 'users', 'update');
        }
        $object->save();
        $message = trans('translation.user_message_picture');
        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Update the user's profile picture.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function deletePicture(Request $request, $uuid)
    {
        $object = User::whereUuid($uuid)->first();
        $object->picture = '';
        $object->save();
        deletePicture($object, 'users', 'picture');
        $message = trans('translation.user_message_delete_picture');
        return response()->json(['success' => true, 'message' => $message]);
    }
}
