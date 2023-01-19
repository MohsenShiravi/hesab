<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\CostTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('warehouses')->group(function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('warehouses.index');
        Route::get('/create', [WarehouseController::class, 'create'])->name('warehouses.create');
        Route::post('/store', [WarehouseController::class, 'store'])->name('warehouses.store');
        Route::get('/edit/{warehouse}', [WarehouseController::class, 'edit'])->name('warehouses.edit');
        Route::post('/update/{warehouse}', [WarehouseController::class, 'update'])->name('warehouses.update');
        Route::get('/destroy/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouses.destroy');
    });

    Route::post('provinces/get-cities', [ProvinceController::class, 'getCities'])->name('provinces.get-cities');

    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
        Route::post('{role}/update', [RoleController::class, 'update'])->name('role.update');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
        Route::get('/destroy/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    });

    Route::prefix('/products')->group(function (){
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/delete/{product}/{file}', [ProductController::class, 'deleteFile'])->name('products.delete-file');
        Route::get('/confirm/{product}', [ProductController::class, 'confirm'])->name('products.confirm');
    });

    Route::prefix('/product-users')->group(function () {
        Route::get('/', [ProductUserController::class, 'index'])->name('product-users.index');
        Route::get('/create', [ProductUserController::class, 'create'])->name('product-users.create');
        Route::post('/store', [ProductUserController::class, 'store'])->name('product-users.store');
        Route::get('/edit/{product_user}', [ProductUserController::class, 'edit'])->name('product-users.edit');
        Route::post('/update/{product_user}', [ProductUserController::class, 'update'])->name('product-users.update');
        Route::get('/destroy/{product_user}', [ProductUserController::class, 'destroy'])->name('product-users.destroy');
        Route::get('/activate/{product_user}', [ProductUserController::class, 'activate'])->name('product-users.activate');
        Route::get('/deactivate/{product_user}', [ProductUserController::class, 'deactivate'])->name('product-users.deactivate');
    });


    Route::prefix('invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices.index');
        Route::get('/create', [InvoiceController::class, 'create'])->name('invoices.create');
        Route::post('/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::post('/update/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::get('/destroy/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
        Route::post('/date-operation/{invoice}', [InvoiceController::class, 'dateOperation'])->name('invoices.date-operation');
        Route::get('/details-invoice/{invoice}', [InvoiceController::class, 'detailsInvoice'])->name('invoices.details-invoice');
    });

    Route::prefix('/transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('/store', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/edit/{transaction}', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::post('/update/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::get('/destroy/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('/cost-types')->group(function () {
        Route::get('/', [CostTypeController::class, 'index'])->name('cost-types.index');
        Route::get('/create', [CostTypeController::class, 'create'])->name('cost-types.create');
        Route::post('/store', [CostTypeController::class, 'store'])->name('cost-types.store');
        Route::get('/edit/{cost_type}', [CostTypeController::class, 'edit'])->name('cost-types.edit');
        Route::post('/update/{cost_type}', [CostTypeController::class, 'update'])->name('cost-types.update');
        Route::get('/destroy/{cost_type}', [CostTypeController::class, 'destroy'])->name('cost-types.destroy');
    });

    Route::prefix('/costs')->group(function () {
        Route::get('/', [CostController::class, 'index'])->name('costs.index');
        Route::get('/create', [CostController::class, 'create'])->name('costs.create');
        Route::post('/store', [CostController::class, 'store'])->name('costs.store');
        Route::get('/edit/{cost}', [CostController::class, 'edit'])->name('costs.edit');
        Route::post('/update/{cost}', [CostController::class, 'update'])->name('costs.update');
        Route::get('/destroy/{cost}', [CostController::class, 'destroy'])->name('costs.destroy');
    });
});

Route::prefix('/bank-accounts')->group(function () {
    Route::get('/', [BankAccountController::class, 'index'])->name('bank-accounts.index');
    Route::get('/create', [BankAccountController::class, 'create'])->name('bank-accounts.create');
    Route::post('/store', [BankAccountController::class, 'store'])->name('bank-accounts.store');
    Route::get('/edit/{bank_account}', [BankAccountController::class, 'edit'])->name('bank-accounts.edit');
    Route::post('/update/{bank_account}', [BankAccountController::class, 'update'])->name('bank-accounts.update');
    Route::get('/destroy/{bank_account}', [BankAccountController::class, 'destroy'])->name('bank-accounts.destroy');
});
