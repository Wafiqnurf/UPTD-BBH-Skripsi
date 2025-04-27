<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // BLOG routes group
    Route::prefix('blog')->name('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::get('/create', [BlogController::class, 'create'])->name('.create');
        Route::post('/store', [BlogController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('.update');
        Route::post('/destroy/{id}', [BlogController::class, 'destroy'])->name('.destroy');
    });

    // PRODUK routes group
    Route::prefix('produk')->name('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index']);
        Route::get('/create', [ProdukController::class, 'create'])->name('.create');
        Route::post('/store', [ProdukController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [ProdukController::class, 'update'])->name('.update');
        Route::post('/destroy/{id}', [ProdukController::class, 'destroy'])->name('.destroy');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
