<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RowMaterialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RowInvoiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WorkerController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('check')->group(function () {
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::patch('/{role}/status', [RoleController::class, 'status'])->name('roles.status');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::patch('/{permission}/status', [PermissionController::class, 'status'])->name('permissions.status');
    });

    Route::prefix('groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('groups.index');
        Route::patch('/{group}/status', [GroupController::class, 'status'])->name('groups.status');
    });

    Route::prefix('sections')->group(function () {
        Route::get('/', [SectionController::class, 'index'])->name('sections.index');
        Route::get('/create', [SectionController::class, 'create'])->name('sections.create');
        Route::post('/', [SectionController::class, 'store'])->name('sections.store');
        Route::get('/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
        Route::put('/{section}', [SectionController::class, 'update'])->name('sections.update');
        Route::delete('/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');
    });

    Route::prefix('workers')->group(function () {
        Route::get('/', [WorkerController::class, 'index'])->name('workers.index');
        Route::get('/create', [WorkerController::class, 'create'])->name('workers.create');
        Route::post('/', [WorkerController::class, 'store'])->name('workers.store');
        Route::get('/{worker}/edit', [WorkerController::class, 'edit'])->name('workers.edit');
        Route::put('/{worker}', [WorkerController::class, 'update'])->name('workers.update');
        Route::delete('/{worker}', [WorkerController::class, 'destroy'])->name('workers.destroy');
    });

    Route::prefix('warehouses')->group(function (){
        Route::get('/' , [WarehouseController::class , 'index'])->name('warehouses.index');
        Route::get('/create' , [WarehouseController::class , 'create'])->name('warehouses.create');
        Route::post('/' , [WarehouseController::class , 'store'])->name('warehouses.store');
        Route::get('/{warehouse}/edit' , [WarehouseController::class , 'edit'])->name('warehouses.edit');
        Route::get('/warehouse' , [WarehouseController::class , 'show'])->name('warehouses.show');
        Route::put('/{warehouse}', [WarehouseController::class, 'update'])->name('warehouses.update');
        Route::delete('/{warehouse}' , [WarehouseController::class , 'destroy'])->name('warehouses.destroy');
    });

    Route::prefix('/invoices')->group(function (){
        Route::get('/' , [InvoiceController::class, 'index'])->name('invoices.index');
        Route::get('/create' , [InvoiceController::class, 'create'])->name('invoices.create');
        Route::post('/' , [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/{invoice}/edit' , [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
        Route::put('/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::delete('/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    });

    Route::prefix('/row_materials')->group(function (){
        Route::get('/' , [RowMaterialController::class, 'index'])->name('row_materials.index');
        Route::get('/create' , [RowMaterialController::class, 'create'])->name('row_materials.create');
        Route::post('/' , [RowMaterialController::class, 'store'])->name('row_materials.store');
        Route::get('/{row_material}/edit' , [RowMaterialController::class, 'edit'])->name('row_materials.edit');
        Route::put('/{row_material}', [RowMaterialController::class, 'update'])->name('row_materials.update');
        Route::delete('/{row_material}', [RowMaterialController::class, 'destroy'])->name('row_materials.destroy');
    });

    Route::prefix('/row_invoices')->group(function (){
        Route::get('/' , [RowInvoiceController::class, 'index'])->name('row_invoices.index');
        Route::get('/create' , [RowInvoiceController::class, 'create'])->name('row_invoices.create');
        Route::post('/' , [RowInvoiceController::class, 'store'])->name('row_invoices.store');
        Route::get('/{row_invoice}/edit' , [RowInvoiceController::class, 'edit'])->name('row_invoices.edit');
        Route::put('/{row_invoice}', [RowInvoiceController::class, 'update'])->name('row_invoices.update');
        Route::delete('/{row_invoice}', [RowInvoiceController::class, 'destroy'])->name('row_invoices.destroy');
    });

    Route::prefix('/machines')->group(function(){
        Route::get('/' , [MachineController::class , 'index'])->name('machines.index');
        Route::get('/create' , [MachineController::class , 'create'])->name('machines.create');
        Route::post('/' , [MachineController::class , 'store'])->name('machines.store');
        Route::get('/{machine}/edit' , [MachineController::class , 'edit'])->name('machines.edit');
        Route::put('/{machine}' , [MachineController::class , 'update'])->name('machines.update');
        Route::delete('/{machine}' , [MachineController::class , 'destroy'])->name('machines.destroy');
    });
});

