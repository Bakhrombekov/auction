<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('classification', ClassificationController::class)->except('show');
    Route::resource('material', MaterialController::class)->except('show');
    Route::resource('product', ProductController::class);

});

Auth::routes();
