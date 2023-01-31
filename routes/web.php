<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\ProductController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\DetailUserController;
use App\Http\Controllers\Backsite\CartController;
// use transaction
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DistributorController;
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

Route::get('/', function () {
    return redirect('login');
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('product', ProductController::class);
    Route::get('addproduct', [ProductController::class, 'create'])->name('addproduct');
    // permission
    Route::resource('permission', PermissionController::class);

    // role
    Route::resource('role', RoleController::class);

    // user
    Route::resource('user', UserController::class);

    // type user
    Route::resource('type_user', TypeUserController::class);
    // detail user
    Route::resource('detail_user', DetailUserController::class);
    Route::put('change-pw/{id}', [DetailUserController::class, 'changepw'])->name('update-password');
    Route::get('edit-pw', [DetailUserController::class, 'editpw'])->name('detail_user.editpw');
    // cart
    Route::resource('cart', CartController::class);
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');

    // transaction
    Route::resource('transaction', TransactionController::class);
    // route get show
    Route::get('transactions/', [TransactionController::class, 'trx'])->name('transaction.trx');

    // distributor
    Route::resource('distributor', DistributorController::class);


});


