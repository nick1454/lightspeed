<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

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
Route::post('/category/{id}/update', [categoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}/destroy', [categoryController::class, 'destroy'])->name('category.destroy');

Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/form', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::get('/subcategory/list', [SubCategoryController::class, 'index'])->name('subcategory.list');
Route::get('/subcategory/{id}/form', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/subcategory/{id}/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/subcategory/{id}/destroy', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');




