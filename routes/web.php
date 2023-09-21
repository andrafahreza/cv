<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, "index"])->name("index");
Route::get('login-adminku', [AuthController::class, "login"])->name("login-adminku")->middleware('guest');
Route::post('login-adminku', [AuthController::class, "authenticate"])->name("loginkan-adminku");

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('home', [HomeController::class, 'home'])->name('home');

    Route::group(["prefix" => "profile"], function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/', [ProfileController::class, 'save_profile'])->name('save_profile');

        Route::get('change-pass', function() { return abort(404); });
        Route::post('change-pass', [ProfileController::class, 'change_pass'])->name('change-pass');
        Route::get('upload-cv', function() { return abort(404); });
        Route::post('upload-cv', [ProfileController::class, 'upload_cv'])->name('upload-cv');
    });
});
