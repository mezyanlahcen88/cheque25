<?php

use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Carbon;
use App\Models\LanguageTranslate;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\SharedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::name('admin.')->group(function () {
    //     Route::get('/admin/users/profile', [UserManagementController::class ,'profile'])->name('users.profile');
    //     Route::get('/admin/users/get-users-json', [UserManagementController::class ,'getUsersJson'])->name('users.getUsersJson');
    //     Route::resource('/admin/users', UserManagementController::class);
    //     Route::resource('/admin/roles', RoleManagementController::class);
    //     Route::resource('/admin/permissions', PermissionManagementController::class);
    // });

});

Route::get('/error', function () {
    abort(500);
});
Route::get('/hash', function () {
    $password = Hash::make('azerty123');
    return $password;
});
Route::get('/sss', function () {
    return getSettings()['sender_default_name'];
});
Route::get('/assign', function () {
    $object =User::first();
    $object->assignRole(2);

});
Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

Route::get('/permissions', function () {
    $role = Role::first();
    $permissions = Permission::pluck('id','id')->all();
    $role->syncPermissions($permissions);
});

Route::get('/state/{id}', [SharedController::class, 'getCities'])->name('location.cities');
