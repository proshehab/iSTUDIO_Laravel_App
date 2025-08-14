<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\HomeHeroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\FrontendController;


// Frontend Routes
Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about',[FrontendController::class,'about'])->name('frontend.about');
Route::get('/service',[FrontendController::class,'service'])->name('frontend.service');
Route::get('/project',[FrontendController::class,'project'])->name('frontend.project');
Route::get('/contact',[FrontendController::class,'contact'])->name('frontend.contact');




Route::get('/logout', [LoginController::class, 'logout'])->name('adminLogout');

// Routes for guests
Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'adminLogin')->name('adminLogin');
        Route::post('/adminLogin', 'authenticate')->name('authenticate');
    });
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    
    // Dashboard Routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard.index');
    });


   Route::controller(HomeHeroController::class)->group(function () {
        Route::get('/hero-section', 'index')->name('heroSection.index');
        Route::post('/hero-section/store', 'store')->name('heroSection.store');
    });
});
