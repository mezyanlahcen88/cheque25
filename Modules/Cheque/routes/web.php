<?php

use Illuminate\Support\Facades\Route;

use Modules\Cheque\App\Http\Controllers\ChequeController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/cheque/changestatus', [ChequeController::class, 'changeStatus'])->name('cheque.changestatus');
    //to permanently delete
    Route::delete('/cheque/{id}/force_delete', [ChequeController::class, 'forceDelete'])->name('cheque.forceDelete');
    // to restore
    Route::put('/cheque/{id}/restore', [ChequeController::class, 'restore'])->name('cheque.restore');
    //liste all deleted
    Route::get('/cheque/trashed', [ChequeController::class, 'trashed'])->name('cheque.trashed');
    // Get cheques JSON
        Route::get('/cheque/get-cheques-json', [ChequeController::class ,'getChequesJson'])->name('cheques.getChequesJson');
    // Get cheques JSON
    Route::get('/cheque/get-deleted-cheques-json', [ChequeController::class ,'getDeletedChequesJson'])->name('cheques.getDeletedChequesJson');
   // delete multiple
    Route::post('/cheque/delete-multiple', [ChequeController::class, 'deleteMultiple'])->name('cheque.deleteMultiple');
    Route::post('/cheque/activate-multiple', [ChequeController::class, 'activateMultiple'])->name('cheque.activateMultiple');
    Route::post('/cheque/restore-multiple', [ChequeController::class, 'restoreMultiple'])->name('cheque.restoreMultiple');
    Route::resource('cheque', ChequeController::class)->names('cheque');
});
