<?php

use App\Http\Controllers\ArticalsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/index', function () {
        return view('admin.index');
    })->name('index');

    Route::prefix('permissions')->group(function () {
        Route::resource('permissions', PermissionsController::class);
    });


    Route::prefix('users')->group(function () {
        Route::resource('user', UserController::class);
    });


    Route::prefix('Category')->group(function () {
        Route::resource('category', CategoryController::class);
    });

    Route::prefix('Articals')->group(function () {
        Route::resource('articals', ArticalsController::class);
        Route::get('status/{id}', [ArticalsController::class, 'changeStatus'])->name('articals.status');
    });

    Route::get('/', [ArticalsController::class, 'index'])->name('artical.index');
});