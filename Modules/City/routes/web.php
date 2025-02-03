<?php

use Illuminate\Support\Facades\Route;

use Modules\City\App\Http\Controllers\CityController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/city/changestatus', [CityController::class, 'changeStatus'])->name('city.changestatus');
    //to permanently delete
    Route::delete('/city/{id}/force_delete', [CityController::class, 'forceDelete'])->name('city.forceDelete');
    // to restore
    Route::put('/city/{id}/restore', [CityController::class, 'restore'])->name('city.restore');
    //liste all deleted
    Route::get('/city/trashed', [CityController::class, 'trashed'])->name('city.trashed');
    // Get cities JSON
        Route::get('/city/get-cities-json', [CityController::class ,'getCitiesJson'])->name('cities.getCitiesJson');
    // Get cities JSON
    Route::get('/city/get-deleted-cities-json', [CityController::class ,'getDeletedCitiesJson'])->name('cities.getDeletedCitiesJson');
   // delete multiple
    Route::post('/city/delete-multiple', [CityController::class, 'deleteMultiple'])->name('city.deleteMultiple');
    Route::post('/city/activate-multiple', [CityController::class, 'activateMultiple'])->name('city.activateMultiple');
    Route::post('/city/restore-multiple', [CityController::class, 'restoreMultiple'])->name('city.restoreMultiple');
    Route::resource('city', CityController::class)->names('city');
});
