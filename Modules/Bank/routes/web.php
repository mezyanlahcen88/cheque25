<?php

use Illuminate\Support\Facades\Route;

use Modules\Bank\App\Http\Controllers\BankController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/bank/changestatus', [BankController::class, 'changeStatus'])->name('bank.changestatus');
    //to permanently delete
    Route::delete('/bank/{id}/force_delete', [BankController::class, 'forceDelete'])->name('bank.forceDelete');
    // to restore
    Route::put('/bank/{id}/restore', [BankController::class, 'restore'])->name('bank.restore');
    //liste all deleted
    Route::get('/bank/trashed', [BankController::class, 'trashed'])->name('bank.trashed');
    // Get banks JSON
        Route::get('/bank/get-banks-json', [BankController::class ,'getBanksJson'])->name('banks.getBanksJson');
    // Get banks JSON
    Route::get('/bank/get-deleted-banks-json', [BankController::class ,'getDeletedBanksJson'])->name('banks.getDeletedBanksJson');
   // delete multiple
    Route::post('/bank/delete-multiple', [BankController::class, 'deleteMultiple'])->name('bank.deleteMultiple');
    Route::post('/bank/activate-multiple', [BankController::class, 'activateMultiple'])->name('bank.activateMultiple');
    Route::post('/bank/restore-multiple', [BankController::class, 'restoreMultiple'])->name('bank.restoreMultiple');
    Route::resource('bank', BankController::class)->names('bank');
});
