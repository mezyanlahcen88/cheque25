<?php

use Illuminate\Support\Facades\Route;

use Modules\Agency\App\Http\Controllers\AgencyController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/agency/changestatus', [AgencyController::class, 'changeStatus'])->name('agency.changestatus');
    //to permanently delete
    Route::delete('/agency/{id}/force_delete', [AgencyController::class, 'forceDelete'])->name('agency.forceDelete');
    // to restore
    Route::put('/agency/{id}/restore', [AgencyController::class, 'restore'])->name('agency.restore');
    //liste all deleted
    Route::get('/agency/trashed', [AgencyController::class, 'trashed'])->name('agency.trashed');
    // Get agencies JSON
        Route::get('/agency/get-agencies-json', [AgencyController::class ,'getAgenciesJson'])->name('agencies.getAgenciesJson');
    // Get agencies JSON
    Route::get('/agency/get-deleted-agencies-json', [AgencyController::class ,'getDeletedAgenciesJson'])->name('agencies.getDeletedAgenciesJson');
   // delete multiple
    Route::post('/agency/delete-multiple', [AgencyController::class, 'deleteMultiple'])->name('agency.deleteMultiple');
    Route::post('/agency/activate-multiple', [AgencyController::class, 'activateMultiple'])->name('agency.activateMultiple');
    Route::post('/agency/restore-multiple', [AgencyController::class, 'restoreMultiple'])->name('agency.restoreMultiple');
    Route::resource('agency', AgencyController::class)->names('agency');
});
