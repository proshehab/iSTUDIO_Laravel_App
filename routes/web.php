<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\FrontendController;


// Frontend Routes
Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about',[FrontendController::class,'about'])->name('frontend.about');
Route::get('/service',[FrontendController::class,'service'])->name('frontend.service');
Route::get('/project',[FrontendController::class,'project'])->name('frontend.project');
Route::get('/contact',[FrontendController::class,'contact'])->name('frontend.contact');




Route::get('/logout', [LoginController::class, 'logout'])->name('adminLogout');

Route::middleware('guest')->controller(LoginController::class)->group(function () {
    Route::get('/login', 'adminLogin')->name('adminLogin');
    Route::post('/adminLogin', 'authenticate')->name('authenticate');
});

Route::middleware('auth')->controller(DashboardController::class)->group(function () {

    Route::get('/dashboard', 'index')->name('dashboard.index');
});

Route::middleware('auth')->controller(CategoryController::class)->group(function () {

    Route::get('/category', 'index')->name('category.index');
});
