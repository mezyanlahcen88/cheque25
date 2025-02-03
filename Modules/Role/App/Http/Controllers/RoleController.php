<?php

namespace Modules\Role\App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Modules\Role\App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-show', ['only' => ['show']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()    {

         $objects = Role::orderBy('created_at','desc')->whereNot('name','super admin')->get();
        return view('role::index', compact('objects'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::get();
        $permissions = Permission::get();
        return view('role::create', compact('groupes', 'permissions'));
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {

       $validated = $request->validated();
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('role.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupes = Groupe::get();
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();
        return view('role::show', compact('role', 'groupes', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $groupes = Groupe::get();
        $object = Role::findOrFail($id);
        $groupes = Groupe::get();

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('role::edit', compact('object', 'groupes', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::find($id);

        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
