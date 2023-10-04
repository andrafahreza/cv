<?php

use App\Http\Controllers\Backend\AbilityController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\ClientsController;
use App\Http\Controllers\Backend\EducationController;
use App\Http\Controllers\Backend\ExperienceController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\InterestController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ResumeController;
use App\Http\Controllers\Backend\SkillsController;
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

        Route::group(["prefix" => "experience"], function () {
            Route::post('save-experience/{id?}', [ExperienceController::class, 'save_experience'])->name('save-experience');
            Route::post('list-experience', [ExperienceController::class, 'list_experience'])->name('list-experience');
            Route::get('show-experience/{id?}', [ExperienceController::class, 'show_experience'])->name('show-experience');
            Route::get('delete-experience/{id?}', [ExperienceController::class, 'delete_experience'])->name('delete-experience');
        });

        Route::group(["prefix" => "skills"], function () {
            Route::post('save-skills/{id?}', [SkillsController::class, 'save_skills'])->name('save-skills');
            Route::post('list-skills', [SkillsController::class, 'list_skills'])->name('list-skills');
            Route::get('show-skills/{id?}', [SkillsController::class, 'show_skills'])->name('show-skills');
            Route::get('delete-skills/{id?}', [SkillsController::class, 'delete_skills'])->name('delete-skills');
        });

        Route::group(["prefix" => "interest"], function () {
            Route::post('save-interest/{id?}', [InterestController::class, 'save_interest'])->name('save-interest');
            Route::post('list-interest', [InterestController::class, 'list_interest'])->name('list-interest');
            Route::get('show-interest/{id?}', [InterestController::class, 'show_interest'])->name('show-interest');
            Route::get('delete-interest/{id?}', [InterestController::class, 'delete_interest'])->name('delete-interest');
        });

    });

    Route::group(["prefix" => "certificate"], function () {
        Route::get('/', [CertificateController::class, 'index'])->name('certificate');
        Route::post('save-certificate/{id?}', [CertificateController::class, 'save_certificate'])->name('save-certificate');
        Route::post('list-certificate', [CertificateController::class, 'list_certificate'])->name('list-certificate');
        Route::get('delete-certificate/{id?}', [CertificateController::class, 'delete_certificate'])->name('delete-certificate');
    });

    Route::group(["prefix" => "portfolio"], function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
        Route::post('save-portfolio/{id?}', [PortfolioController::class, 'save_portfolio'])->name('save-portfolio');
        Route::post('list-portfolio', [PortfolioController::class, 'list_portfolio'])->name('list-portfolio');
        Route::get('show-portfolio/{id?}', [PortfolioController::class, 'show_portfolio'])->name('show-portfolio');
        Route::get('delete-portfolio/{id?}', [PortfolioController::class, 'delete_portfolio'])->name('delete-portfolio');

        Route::group(["prefix" => "category"], function () {
            Route::get('search-category/{id?}', [PortfolioController::class, 'search_category'])->name('search-category');
            Route::post('save-category/{id?}', [PortfolioController::class, 'save_category'])->name('save-category');
            Route::post('list-category', [PortfolioController::class, 'list_category'])->name('list-category');
            Route::get('show-category/{id?}', [PortfolioController::class, 'show_category'])->name('show-category');
            Route::get('delete-category/{id?}', [PortfolioController::class, 'delete_category'])->name('delete-category');
        });
    });
});
