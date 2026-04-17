<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});
Route::middleware('auth')->group(function () {
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/form', [UnitController::class, 'create'])->name('unit.create');

    Route::get('/unit/list', [UnitController::class, 'index'])->name('unit.list');
    Route::get('/unit/{id}/form', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/{id}/update', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('/unit/{id}/destroy', [UnitController::class, 'destroy'])->name('unit.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/materials/list', function () {
        return view('materials.index');
    })->name('materials.list');

    Route::get('/materials/form', function () {
        return view('materials.form');
    })->name('materials.form');

    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/form', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/list', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/category/{id}/form', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/subcategory/list', function () {
        return view('subcategory.index');
    })->name('subcategory.list');

    Route::get('/subcategory/form', function () {
        return view('subcategory.form');
    })->name('subcategory.form');
});





