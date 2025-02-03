<?php

use Illuminate\Support\Facades\Route;

use Modules\Carnet\App\Http\Controllers\CarnetController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/carnet/changestatus', [CarnetController::class, 'changeStatus'])->name('carnet.changestatus');
    //to permanently delete
    Route::delete('/carnet/{id}/force_delete', [CarnetController::class, 'forceDelete'])->name('carnet.forceDelete');
    // to restore
    Route::put('/carnet/{id}/restore', [CarnetController::class, 'restore'])->name('carnet.restore');
    //liste all deleted
    Route::get('/carnet/trashed', [CarnetController::class, 'trashed'])->name('carnet.trashed');
    // Get carnets JSON
        Route::get('/carnet/get-carnets-json', [CarnetController::class ,'getCarnetsJson'])->name('carnets.getCarnetsJson');
    // Get carnets JSON
    Route::get('/carnet/get-deleted-carnets-json', [CarnetController::class ,'getDeletedCarnetsJson'])->name('carnets.getDeletedCarnetsJson');
   // delete multiple
    Route::post('/carnet/delete-multiple', [CarnetController::class, 'deleteMultiple'])->name('carnet.deleteMultiple');
    Route::post('/carnet/activate-multiple', [CarnetController::class, 'activateMultiple'])->name('carnet.activateMultiple');
    Route::post('/carnet/restore-multiple', [CarnetController::class, 'restoreMultiple'])->name('carnet.restoreMultiple');
    Route::resource('carnet', CarnetController::class)->names('carnet');
});
