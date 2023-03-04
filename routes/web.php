<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;

use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;

use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserDetailController;
use App\Http\Controllers\User\UserCheckoutController;
use App\Http\Controllers\User\UserActivityController;
use App\Http\Controllers\User\UserPembayaranController;
use App\Http\Controllers\User\UserFiturTambahController;

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

Route::get('loginadmin', [AdminLoginController::class, 'loginadmin'])->name('loginadmin');

Route::post('proses_loginadmin', [AdminLoginController::class, 'proses_loginadmin'])->name('proses_loginadmin');

Route::get('logoutadmin', [AdminLoginController::class, 'logoutadmin'])->name('logoutadmin');

Route::prefix('/admin')->group(function () {
    Route::prefix('/')->name('dashboard.')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    }); 

    Route::prefix('datacustomer')->name('datacustomer.')->group(function () {
        Route::get('/', [AdminCustomerController::class, 'index'])->name('index');
        Route::get('/show/{id}', [AdminCustomerController::class, 'show'])->name('show');
    });

    Route::prefix('datakategori')->name('datakategori.')->group(function () {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('index');
        Route::get('/create', [AdminKategoriController::class, 'create'])->name('create');
        Route::post('/store', [AdminKategoriController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AdminKategoriController::class, 'show'])->name('show');
        Route::post('/update/{id}', [AdminKategoriController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminKategoriController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('dataproduk')->name('dataproduk.')->group(function () {
        Route::get('/', [AdminProdukController::class, 'index'])->name('index');
        Route::get('/create', [AdminProdukController::class, 'create'])->name('create');
        Route::post('/store', [AdminProdukController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AdminProdukController::class, 'show'])->name('show');
        Route::post('/update/{id}', [AdminProdukController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminProdukController::class, 'delete'])->name('delete');
    });

    Route::prefix('datapemesanan')->name('datapemesanan.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('index');
    });
}); 

Route::get('loginuser', [UserLoginController::class, 'loginuser'])->name('loginuser');
Route::post('proses_loginuser', [UserLoginController::class, 'proses_loginuser'])->name('proses_loginuser');

Route::get('registeruser', [UserRegisterController::class, 'registeruser'])->name('registeruser');
Route::post('proses_registeruser', [UserRegisterController::class, 'proses_registeruser'])->name('proses_registeruser');

Route::get('logoutuser', [UserLoginController::class, 'logoutuser'])->name('logoutuser');

Route::prefix('/')->group(function () {
    Route::prefix('/')->name('landing.')->group(function () {
        Route::get('/', [UserHomeController::class, 'index'])->name('index');
    }); 

    Route::prefix('/detail')->name('detail.')->group(function () {
        Route::get('/{id}', [UserDetailController::class, 'index'])->name('index');
    }); 

    Route::prefix('/checkout')->name('checkout.')->group(function () {
        Route::get('/', [UserCheckoutController::class, 'index'])->name('index')->middleware('auth');
        Route::post('/create/{id}', [UserCheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');
        Route::post('/create', [UserCheckoutController::class, 'create'])->name('create')->middleware('auth');   
    });

    Route::prefix('/activity')->name('activity.')->group(function () {
        Route::get('/', [UserActivityController::class, 'index'])->name('index')->middleware('auth');
    });

    Route::prefix('/bayar')->name('bayar.')->group(function () {
        Route::get('/{id}', [UserPembayaranController::class, 'index'])->name('index')->middleware('auth');
        Route::post('/updateimg/{id}', [UserPembayaranController::class, 'updateimg'])->name('updateimg')->middleware('auth');
    });

    Route::prefix('/tambah')->name('tambah.')->group(function () {
        Route::get('/', [UserFiturTambahController::class, 'index'])->name('index');
        Route::post('/proses', [UserFiturTambahController::class, 'proses'])->name('proses');
    });


}); 


// Route::get('/', function () {
//     return view('welcome');
// });
