<?php

use Illuminate\Support\Facades\Route;

use Modules\Exercice\App\Http\Controllers\ExerciceController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/exercice/changestatus', [ExerciceController::class, 'changeStatus'])->name('exercice.changestatus');
    //to permanently delete
    Route::delete('/exercice/{id}/force_delete', [ExerciceController::class, 'forceDelete'])->name('exercice.forceDelete');
    // to restore
    Route::put('/exercice/{id}/restore', [ExerciceController::class, 'restore'])->name('exercice.restore');
    //liste all deleted
    Route::get('/exercice/trashed', [ExerciceController::class, 'trashed'])->name('exercice.trashed');
    // Get exercices JSON
        Route::get('/exercice/get-exercices-json', [ExerciceController::class ,'getExercicesJson'])->name('exercices.getExercicesJson');
    // Get exercices JSON
    Route::get('/exercice/get-deleted-exercices-json', [ExerciceController::class ,'getDeletedExercicesJson'])->name('exercices.getDeletedExercicesJson');
   // delete multiple
    Route::post('/exercice/delete-multiple', [ExerciceController::class, 'deleteMultiple'])->name('exercice.deleteMultiple');
    Route::post('/exercice/activate-multiple', [ExerciceController::class, 'activateMultiple'])->name('exercice.activateMultiple');
    Route::post('/exercice/restore-multiple', [ExerciceController::class, 'restoreMultiple'])->name('exercice.restoreMultiple');
    Route::resource('exercice', ExerciceController::class)->names('exercice');
});
