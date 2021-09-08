<?php

use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\admin\crud_products\ProductsPageController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('access')->group(function () {
    // login
    Route::get('/login', [AuthAdminController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthAdminController::class, 'login'])->name('login');

    // register
    Route::get('/register', [AuthAdminController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthAdminController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => '/products'
], function() {
    // products dashboard
    Route::get('/', [ProductsPageController::class, 'home'])->name('products-crud');

    // logout
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('logout');

    // crud products
    Route::post('/', [ProductsPageController::class, 'store'])->name('create-product');

    Route::put('/{id}', [ProductsPageController::class, 'change'])->name('change-product');

    Route::delete('/{id}', [ProductsPageController::class, 'destroy'])->name('delete-product');
});
