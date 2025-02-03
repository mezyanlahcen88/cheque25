<?php

use Illuminate\Support\Facades\Route;

use Modules\Effet\App\Http\Controllers\EffetController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/effet/changestatus', [EffetController::class, 'changeStatus'])->name('effet.changestatus');
    //to permanently delete
    Route::delete('/effet/{id}/force_delete', [EffetController::class, 'forceDelete'])->name('effet.forceDelete');
    // to restore
    Route::put('/effet/{id}/restore', [EffetController::class, 'restore'])->name('effet.restore');
    //liste all deleted
    Route::get('/effet/trashed', [EffetController::class, 'trashed'])->name('effet.trashed');
    // Get effets JSON
        Route::get('/effet/get-effets-json', [EffetController::class ,'getEffetsJson'])->name('effets.getEffetsJson');
    // Get effets JSON
    Route::get('/effet/get-deleted-effets-json', [EffetController::class ,'getDeletedEffetsJson'])->name('effets.getDeletedEffetsJson');
   // delete multiple
    Route::post('/effet/delete-multiple', [EffetController::class, 'deleteMultiple'])->name('effet.deleteMultiple');
    Route::post('/effet/activate-multiple', [EffetController::class, 'activateMultiple'])->name('effet.activateMultiple');
    Route::post('/effet/restore-multiple', [EffetController::class, 'restoreMultiple'])->name('effet.restoreMultiple');
    Route::resource('effet', EffetController::class)->names('effet');
});
