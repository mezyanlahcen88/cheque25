<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\App\Http\Controllers\SettingController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('setting', SettingController::class)->names('setting');
});
