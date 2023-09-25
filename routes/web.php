<?php

use App\Http\Controllers\Backend\AbilityController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ClientsController;
use App\Http\Controllers\Backend\EducationController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ResumeController;
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
        Route::post('change-pass', [ProfileController::class, 'change_pass'])->name('change-pass');
        Route::post('upload-cv', [ProfileController::class, 'upload_cv'])->name('upload-cv');
    });

    Route::group(["prefix" => "ability"], function () {
        Route::get('/', [AbilityController::class, 'index'])->name('ability');
        Route::post('list-ability', [AbilityController::class, 'list_ability'])->name('list-ability');
        Route::get('show-ability/{id?}', [AbilityController::class, 'show_ability'])->name('show-ability');
        Route::post('save-ability/{id?}', [AbilityController::class, 'save_ability'])->name('save-ability');
        Route::get('delete-ability/{id?}', [AbilityController::class, 'delete_ability'])->name('delete-ability');

        Route::group(["prefix" => "clients"], function () {
            Route::post('list-clients', [ClientsController::class, 'list_clients'])->name('list-clients');
            Route::get('show-clients/{id?}', [ClientsController::class, 'show_clients'])->name('show-clients');
            Route::post('save-clients/{id?}', [ClientsController::class, 'save_clients'])->name('save-clients');
            Route::get('delete-clients/{id?}', [ClientsController::class, 'delete_clients'])->name('delete-clients');
        });
    });

    Route::group(["prefix" => "resume"], function () {
        Route::get('/', [ResumeController::class, 'index'])->name('resume');

        Route::group(["prefix" => "education"], function () {
            Route::post('save-education/{id?}', [EducationController::class, 'save_education'])->name('save-education');
            Route::post('list-education', [EducationController::class, 'list_education'])->name('list-education');
            Route::get('show-education/{id?}', [EducationController::class, 'show_education'])->name('show-education');
            Route::get('delete-education/{id?}', [EducationController::class, 'delete_education'])->name('delete-education');
        });

    });
});
