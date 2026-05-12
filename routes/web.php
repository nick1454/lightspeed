<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialInwardController;
use App\Http\Controllers\MaterialOutwardController;
use App\Http\Controllers\MaterialTransferController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\PoSupplierController;
use App\Http\Controllers\PoJobWorkController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ClientController;

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
    })->name('dashboard');
    Route::get('/materials/list', function () {
        return view('materials.index');
    })->name('materials.list');

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

    Route::post('/warehouse/store', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::get('/warehouse/form', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::get('/warehouse/list', [WarehouseController::class, 'index'])->name('warehouse.list');
    Route::get('/warehouse/{id}/form', [WarehouseController::class, 'edit'])->name('warehouse.edit');
    Route::post('/warehouse/{id}/update', [WarehouseController::class, 'update'])->name('warehouse.update');
    Route::delete('/warehouse/{id}/destroy', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

    Route::post('/po-supplier/store', [PoSupplierController::class, 'store'])->name('po.supplier.store');
    Route::get('/po-supplier/form', [PoSupplierController::class, 'create'])->name('po.supplier.create');
    Route::get('/po-supplier/list', [PoSupplierController::class, 'index'])->name('po.supplier.list');
    Route::get('/po-supplier/{id}/form', [PoSupplierController::class, 'edit'])->name('po.supplier.edit');
    Route::post('/po-supplier/{id}/update', [PoSupplierController::class, 'update'])->name('po.supplier.update');
    Route::delete('/po-supplier/{id}/destroy', [PoSupplierController::class, 'destroy'])->name('po.supplier.destroy');

    Route::post('/po-supplier/items/store', [PoSupplierController::class, 'storeItem'])->name('po.supplier.items.store');
    Route::post('/po-supplier/items/{id}/destroy', [PoSupplierController::class, 'deleteItem'])->name('po.supplier.items.destroy');

    Route::post('/po-job-work/store', [PoJobWorkController::class, 'store'])->name('po.job.work.store');
    Route::get('/po-job-work/form', [PoJobWorkController::class, 'create'])->name('po.job.work.create');
    Route::get('/po-job-work/list', [PoJobWorkController::class, 'index'])->name('po.job.work.list');
    Route::get('/po-job-work/{id}/form', [PoJobWorkController::class, 'edit'])->name('po.job.work.edit');
    Route::post('/po-job-work/{id}/update', [PoJobWorkController::class, 'update'])->name('po.job.work.update');
    Route::delete('/po-job-work/{id}/destroy', [PoJobWorkController::class, 'destroy'])->name('po.job.work.destroy');

    Route::post('/po-job-work/items/store', [PoJobWorkController::class, 'storeItem'])->name('po.job.work.items.store');
    Route::post('/po-job-work/items/{id}/destroy', [PoJobWorkController::class, 'deleteItem'])->name('po.job.work.items.destroy');

    // ESTIMATES
    Route::post('/estimate/store', [EstimateController::class, 'store'])->name('estimate.store');
    Route::get('/estimate/form', [EstimateController::class, 'create'])->name('estimate.create');
    Route::get('/estimate/list', [EstimateController::class, 'index'])->name('estimate.list');
    Route::get('/estimate/{id}/form', [EstimateController::class, 'edit'])->name('estimate.edit');
    Route::post('/estimate/{id}/update', [EstimateController::class, 'update'])->name('estimate.update');
    Route::delete('/estimate/{id}/destroy', [EstimateController::class, 'destroy'])->name('estimate.destroy');
    Route::get('/estimate/{id}/print', [EstimateController::class, 'show'])->name('estimate.print');

    Route::post('/estimate/items/store', [EstimateController::class, 'storeItem'])->name('estimate.items.store');
    Route::post('/estimate/items/{id}/destroy', [EstimateController::class, 'deleteItem'])->name('estimate.items.destroy');
    Route::post('/estimate/{id}/changeStatus', [EstimateController::class, 'changeStatus'])->name('estimate.changeStatus');
    Route::post('/estimate/{id}/makeJobWorkPo', [EstimateController::class, 'makeJobWorkPo'])->name('estimate.makeJobWorkPo');
    // ESTIMATES end

    // material inward
    Route::post('/materialinward/store', [MaterialInwardController::class, 'store'])->name('materialinward.store');
    Route::get('/materialinward/form', [MaterialInwardController::class, 'create'])->name('materialinward.create');
    Route::get('/materialinward/list', [MaterialInwardController::class, 'index'])->name('materialinward.list');
    Route::get('/materialinward/{id}/form', [MaterialInwardController::class, 'edit'])->name('materialinward.edit');
    Route::post('/materialinward/{id}/update', [MaterialInwardController::class, 'update'])->name('materialinward.update');
    Route::delete('/materialinward/{id}/destroy', [MaterialInwardController::class, 'destroy'])->name('materialinward.destroy');
    Route::get('/materialinward/{id}/print', [MaterialInwardController::class, 'show'])->name('materialinward.print');

    Route::post('/materialinward/items/store', [MaterialInwardController::class, 'storeItem'])->name('materialinward.items.store');
    Route::post('/materialinward/items/{id}/destroy', [MaterialInwardController::class, 'deleteItem'])->name('materialinward.items.destroy');
    // material inward end

    // material outward
    Route::post('/materialoutward/store', [MaterialOutwardController::class, 'store'])->name('materialoutward.store');
    Route::get('/materialoutward/form', [MaterialOutwardController::class, 'create'])->name('materialoutward.create');
    Route::get('/materialoutward/list', [MaterialOutwardController::class, 'index'])->name('materialoutward.list');
    Route::get('/materialoutward/{id}/form', [MaterialOutwardController::class, 'edit'])->name('materialoutward.edit');
    Route::post('/materialoutward/{id}/update', [MaterialOutwardController::class, 'update'])->name('materialoutward.update');
    Route::delete('/materialoutward/{id}/destroy', [MaterialOutwardController::class, 'destroy'])->name('materialoutward.destroy');
    Route::get('/materialoutward/{id}/print', [MaterialOutwardController::class, 'show'])->name('materialoutward.print');

    Route::post('/materialoutward/items/store', [MaterialOutwardController::class, 'storeItem'])->name('materialoutward.items.store');
    Route::post('/materialoutward/items/{id}/destroy', [MaterialOutwardController::class, 'deleteItem'])->name('materialoutward.items.destroy');
    // material outward end

    // material transfer
    Route::post('/materialtransfer/store', [MaterialTransferController::class, 'store'])->name('materialtransfer.store');
    Route::get('/materialtransfer/form', [MaterialTransferController::class, 'create'])->name('materialtransfer.create');
    Route::get('/materialtransfer/list', [MaterialTransferController::class, 'index'])->name('materialtransfer.list');
    Route::get('/materialtransfer/{id}/form', [MaterialTransferController::class, 'edit'])->name('materialtransfer.edit');
    Route::post('/materialtransfer/{id}/update', [MaterialTransferController::class, 'update'])->name('materialtransfer.update');
    Route::delete('/materialtransfer/{id}/destroy', [MaterialTransferController::class, 'destroy'])->name('materialtransfer.destroy');
    Route::get('/materialtransfer/{id}/print', [MaterialTransferController::class, 'show'])->name('materialtransfer.print');

    Route::post('/materialtransfer/items/store', [MaterialTransferController::class, 'storeItem'])->name('materialtransfer.items.store');
    Route::post('/materialtransfer/items/{id}/destroy', [MaterialTransferController::class, 'deleteItem'])->name('materialtransfer.items.destroy');
    // material transfer end


    Route::post('/organisation/store', [OrganisationController::class, 'store'])->name('organisation.store');
    Route::get('/organisation/form', [OrganisationController::class, 'create'])->name('organisation.create');
    Route::get('/organisation/list', [OrganisationController::class, 'index'])->name('organisation.list');
    Route::get('/organisation/{id}/form', [OrganisationController::class, 'edit'])->name('organisation.edit');
    Route::post('/organisation/{id}/update', [OrganisationController::class, 'update'])->name('organisation.update');
    Route::delete('/organisation/{id}/destroy', [OrganisationController::class, 'destroy'])->name('organisation.destroy');

    Route::post('/organisation/items/store', [OrganisationController::class, 'storeItem'])->name('organisation.items.store');
    Route::post('/organisation/items/{id}/destroy', [OrganisationController::class, 'deleteItem'])->name('organisation.items.destroy');

    // clients
    Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/form', [ClientController::class, 'create'])->name('client.create');
    Route::get('/client/list', [ClientController::class, 'index'])->name('client.list');
    Route::get('/client/{id}/form', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/client/{id}/update', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/{id}/destroy', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::post('/client/items/store', [ClientController::class, 'storeItem'])->name('client.items.store');
    Route::post('/client/items/{id}/destroy', [ClientController::class, 'deleteItem'])->name('client.items.destroy');

    // clients end
});

