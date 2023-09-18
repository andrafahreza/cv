<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, "index"])->name("index");
Route::get('login-adminku', [AuthController::class, "login"])->name("login-adminku")->middleware('guest');
Route::post('login-adminku', [AuthController::class, "authenticate"])->name("loginkan-adminku");

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('home', [HomeController::class, 'home'])->name('home');
});
