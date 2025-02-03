<?php

use Illuminate\Support\Facades\Route;

use Modules\Sidebar\App\Http\Controllers\SidebarController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/sidebar/changestatus', [SidebarController::class, 'changeStatus'])->name('sidebar.changestatus');
    //to permanently delete
    Route::delete('/sidebar/{id}/force_delete', [SidebarController::class, 'forceDelete'])->name('sidebar.forceDelete');
    // to restore
    Route::put('/sidebar/{id}/restore', [SidebarController::class, 'restore'])->name('sidebar.restore');
    //liste all deleted
    Route::get('/sidebar/trashed', [SidebarController::class, 'trashed'])->name('sidebar.trashed');
    // Get sidebars JSON
        Route::get('/sidebar/get-sidebars-json', [SidebarController::class ,'getSidebarsJson'])->name('sidebars.getSidebarsJson');
    // Get sidebars JSON
    Route::get('/sidebar/get-deleted-sidebars-json', [SidebarController::class ,'getDeletedSidebarsJson'])->name('sidebars.getDeletedSidebarsJson');
   // delete multiple
    Route::post('/sidebar/delete-multiple', [SidebarController::class, 'deleteMultiple'])->name('sidebar.deleteMultiple');
    Route::post('/sidebar/activate-multiple', [SidebarController::class, 'activateMultiple'])->name('sidebar.activateMultiple');
    Route::post('/sidebar/restore-multiple', [SidebarController::class, 'restoreMultiple'])->name('sidebar.restoreMultiple');
    Route::resource('sidebar', SidebarController::class)->names('sidebar');
});
