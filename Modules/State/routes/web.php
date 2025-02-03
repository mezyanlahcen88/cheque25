<?php

use Illuminate\Support\Facades\Route;

use Modules\State\App\Http\Controllers\StateController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/state/changestatus', [StateController::class, 'changeStatus'])->name('state.changestatus');
    //to permanently delete
    Route::delete('/state/{id}/force_delete', [StateController::class, 'forceDelete'])->name('state.forceDelete');
    // to restore
    Route::put('/state/{id}/restore', [StateController::class, 'restore'])->name('state.restore');
    //liste all deleted
    Route::get('/trashed-states', [StateController::class, 'trashed'])->name('state.trashed');
    // Get states JSON
    Route::get('/states/get-states-json', [StateController::class ,'getStatesJson'])->name('states.getStatesJson');
    // Get states JSON
    Route::get('/state/get-deleted-states-json', [StateController::class ,'getDeletedStatesJson'])->name('states.getDeletedStatesJson');
   // delete multiple
    Route::post('/state/delete-multiple', [StateController::class, 'deleteMultiple'])->name('state.deleteMultiple');
    Route::post('/state/activate-multiple', [StateController::class, 'activateMultiple'])->name('state.activateMultiple');
    Route::post('/state/restore-multiple', [StateController::class, 'restoreMultiple'])->name('state.restoreMultiple');
    Route::resource('state', StateController::class)->names('state');
});
