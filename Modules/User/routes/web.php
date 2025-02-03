<?php
use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\CustomAuthController;
use Modules\User\App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::group(['middleware' => ['auth']], function () {
        // Change the status
        Route::post('/user/changestatus', [UserController::class, 'changeStatus'])->name('user.changestatus');
        // Permanently delete
        Route::delete('/user/{id}/force_delete', [UserController::class, 'forceDelete'])->name('user.forceDelete');
        // Restore
        Route::put('/user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
        // List all deleted
        Route::get('/user/trashed', [UserController::class, 'trashed'])->name('user.trashed');
        // Update overview
        Route::post('/user/{uuid}/update-overview', [UserController::class, 'updateOverview'])->name('user.updateOverview');
        // Update password
        Route::post('/user/{uuid}/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
        // Update picture
        Route::post('/user/{uuid}/update-picture', [UserController::class, 'updatePicture'])->name('user.updatePicture');
        // delete picture
        Route::post('/user/{uuid}/delete-picture', [UserController::class, 'deletePicture'])->name('user.deletePicture');
        // Get users JSON
        // Update email role
        Route::post('/user/{uuid}/update-email-role', [UserController::class, 'updateEmailRole'])->name('user.updateEmailRole');
        // Edit user
        Route::get('/user/{uuid}/edit/{tab}', [UserController::class, 'edit'])->name('user.edit');
        // Show user
        // Get users JSON

        // Get users JSON
        Route::get('/user/get-users-json', [UserController::class, 'getUsersJson'])->name('users.getUsersJson');
        Route::get('/user/get-deleted-users-json', [UserController::class, 'getDeletedUsersJson'])->name('users.getDeletedUsersJson');
        // delete multiple
        Route::post('/user/delete-multiple', [UserController::class, 'deleteMultiple'])->name('user.deleteMultiple');
        Route::post('/user/activate-multiple', [UserController::class, 'activateMultiple'])->name('user.activateMultiple');
        Route::post('/user/restore-multiple', [UserController::class, 'restoreMultiple'])->name('user.restoreMultiple');
        // Profile
        Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
        // Resource routes, except edit and show
        Route::resource('user', UserController::class)
            ->names('user')
            ->except('edit');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/show-forgot-password', [CustomAuthController::class, 'showForgotPassword'])->name('user.showForgotPassword');
        Route::post('/send-email-forgot-password', [CustomAuthController::class, 'sendEmailForgotPassword'])->name('user.sendEmailForgotPassword');
        Route::get('login', [CustomAuthController::class, 'showLogin'])->name('login');
        Route::post('login', [CustomAuthController::class, 'sendLogin']);
        Route::get('/show-forgot-password', [CustomAuthController::class, 'showForgotPassword'])->name('user.showForgotPassword');
        Route::post('/send-email-forgot-password', [CustomAuthController::class, 'sendEmailForgotPassword'])->name('user.sendEmailForgotPassword');

        Route::get('/show-reset-password/{token}', [CustomAuthController::class, 'showResetPassword'])->name('user.showResetPassword');
        Route::post('/send-reset-password', [CustomAuthController::class, 'sendResetPassword'])->name('user.sendResetPassword');
    });
