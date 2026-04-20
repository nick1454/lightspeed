<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Material;

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

Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/form', [BrandController::class, 'create'])->name('brand.create');
Route::get('/brand/list', [BrandController::class, 'index'])->name('brand.list');
Route::get('/brand/{id}/form', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/{id}/update', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{id}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');

Route::post('/size/store', [SizeController::class, 'store'])->name('size.store');
Route::get('/size/form', [SizeController::class, 'create'])->name('size.create');
Route::get('/size/list', [SizeController::class, 'index'])->name('size.list');
Route::get('/size/{id}/form', [SizeController::class, 'edit'])->name('size.edit');
Route::post('/size/{id}/update', [SizeController::class, 'update'])->name('size.update');
Route::delete('/size/{id}/destroy', [SizeController::class, 'destroy'])->name('size.destroy');

Route::post('/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
Route::get('/vendor/form', [VendorController::class, 'create'])->name('vendor.create');
Route::get('/vendor/list', [VendorController::class, 'index'])->name('vendor.list');
Route::get('/vendor/{id}/form', [VendorController::class, 'edit'])->name('vendor.edit');
Route::post('/vendor/{id}/update', [VendorController::class, 'update'])->name('vendor.update');
Route::delete('/vendor/{id}/destroy', [VendorController::class, 'destroy'])->name('vendor.destroy');

Route::post('/material/store', [MaterialController::class, 'store'])->name('material.store');
Route::get('/material/form', [MaterialController::class, 'create'])->name('material.create');
Route::get('/material/list', [MaterialController::class, 'index'])->name('material.list');
Route::get('/material/{id}/form', [MaterialController::class, 'edit'])->name('material.edit');
Route::post('/material/{id}/update', [MaterialController::class, 'update'])->name('material.update');
Route::delete('/material/{id}/destroy', [MaterialController::class, 'destroy'])->name('material.destroy');




