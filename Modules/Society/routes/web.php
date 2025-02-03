<?php

use Illuminate\Support\Facades\Route;

use Modules\Society\App\Http\Controllers\SocietyController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/society/changestatus', [SocietyController::class, 'changeStatus'])->name('society.changestatus');
    //to permanently delete
    Route::delete('/society/{id}/force_delete', [SocietyController::class, 'forceDelete'])->name('society.forceDelete');
    // to restore
    Route::put('/society/{id}/restore', [SocietyController::class, 'restore'])->name('society.restore');
    //liste all deleted
    Route::get('/society/trashed', [SocietyController::class, 'trashed'])->name('society.trashed');
    // Get societies JSON
        Route::get('/society/get-societies-json', [SocietyController::class ,'getSocietiesJson'])->name('societies.getSocietiesJson');
    // Get societies JSON
    Route::get('/society/get-deleted-societies-json', [SocietyController::class ,'getDeletedSocietiesJson'])->name('societies.getDeletedSocietiesJson');
   // delete multiple
    Route::post('/society/delete-multiple', [SocietyController::class, 'deleteMultiple'])->name('society.deleteMultiple');
    Route::post('/society/activate-multiple', [SocietyController::class, 'activateMultiple'])->name('society.activateMultiple');
    Route::post('/society/restore-multiple', [SocietyController::class, 'restoreMultiple'])->name('society.restoreMultiple');
    Route::resource('society', SocietyController::class)->names('society');
});
