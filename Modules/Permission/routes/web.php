<?php

use Illuminate\Support\Facades\Route;

use Modules\Permission\App\Http\Controllers\PermissionController;

Route::group(['middleware' => 'auth'], function () {

    // Get permissions JSON
    Route::get('/permission/get-permissions-json', [PermissionController::class, 'getPermissionsJson'])->name('permissions.getPermissionsJson');
    // Get permissions JSON
    Route::get('/permission/get-deleted-permissions-json', [PermissionController::class, 'getDeletedPermissionsJson'])->name('permissions.getDeletedPermissionsJson');
    // delete multiple
    Route::post('/permission/delete-multiple', [PermissionController::class, 'deleteMultiple'])->name('permission.deleteMultiple');
    Route::post('/permission/activate-multiple', [permissionController::class, 'activateMultiple'])->name('permission.activateMultiple');
    Route::post('/permission/generate', [PermissionController::class, 'generate'])->name('permission.generate');
    Route::resource('permission', PermissionController::class)->names('permission');
});
