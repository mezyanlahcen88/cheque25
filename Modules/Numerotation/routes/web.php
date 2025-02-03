<?php

use Illuminate\Support\Facades\Route;

use Modules\Numerotation\App\Http\Controllers\NumerotationController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/numerotation/changestatus', [NumerotationController::class, 'changeStatus'])->name('numerotation.changestatus');
    //to permanently delete
    Route::delete('/numerotation/{id}/force_delete', [NumerotationController::class, 'forceDelete'])->name('numerotation.forceDelete');
    // to restore
    Route::put('/numerotation/{id}/restore', [NumerotationController::class, 'restore'])->name('numerotation.restore');
    //liste all deleted
    Route::get('/numerotation/trashed', [NumerotationController::class, 'trashed'])->name('numerotation.trashed');
    // Get numerotations JSON
        Route::get('/numerotation/get-numerotations-json', [NumerotationController::class ,'getNumerotationsJson'])->name('numerotations.getNumerotationsJson');
    // Get numerotations JSON
    Route::get('/numerotation/get-deleted-numerotations-json', [NumerotationController::class ,'getDeletedNumerotationsJson'])->name('numerotations.getDeletedNumerotationsJson');
   // delete multiple
    Route::post('/numerotation/delete-multiple', [NumerotationController::class, 'deleteMultiple'])->name('numerotation.deleteMultiple');
    Route::post('/numerotation/activate-multiple', [NumerotationController::class, 'activateMultiple'])->name('numerotation.activateMultiple');
    Route::post('/numerotation/restore-multiple', [NumerotationController::class, 'restoreMultiple'])->name('numerotation.restoreMultiple');
    Route::resource('numerotation', NumerotationController::class)->names('numerotation');
});
