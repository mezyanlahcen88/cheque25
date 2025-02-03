<?php

use Illuminate\Support\Facades\Route;

use Modules\Employe\App\Http\Controllers\EmployeController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/employe/changestatus', [EmployeController::class, 'changeStatus'])->name('employe.changestatus');
    //to permanently delete
    Route::delete('/employe/{id}/force_delete', [EmployeController::class, 'forceDelete'])->name('employe.forceDelete');
    // to restore
    Route::put('/employe/{id}/restore', [EmployeController::class, 'restore'])->name('employe.restore');
    //liste all deleted
    Route::get('/employe/trashed', [EmployeController::class, 'trashed'])->name('employe.trashed');
    // Get employes JSON
        Route::get('/employe/get-employes-json', [EmployeController::class ,'getEmployesJson'])->name('employes.getEmployesJson');
    // Get employes JSON
    Route::get('/employe/get-deleted-employes-json', [EmployeController::class ,'getDeletedEmployesJson'])->name('employes.getDeletedEmployesJson');
   // delete multiple
    Route::post('/employe/delete-multiple', [EmployeController::class, 'deleteMultiple'])->name('employe.deleteMultiple');
    Route::post('/employe/activate-multiple', [EmployeController::class, 'activateMultiple'])->name('employe.activateMultiple');
    Route::post('/employe/restore-multiple', [EmployeController::class, 'restoreMultiple'])->name('employe.restoreMultiple');
    Route::resource('employe', EmployeController::class)->names('employe');
});
