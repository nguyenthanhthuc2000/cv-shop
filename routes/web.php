<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

//AUTH
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

//TRANG CHU
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/san-pham/{catid}', [ProductController::class, 'listProduct'])->name('product.list');

//ADMIN
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkLevel'])->group(function () {
        Route::prefix('admin')->group(function () {

            //DASH_BOARD
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');

            //DANH MUC
            Route::get('/danh-muc-cap-1', [CategoryController::class, 'indexCategory1'])->name('category1.index');
            Route::get('/danh-muc-cap-2', [CategoryController::class, 'indexCategory2'])->name('category2.index');
            Route::get('/them-moi-danh-muc/{level}', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store-category', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/chinh-sua-danh-muc/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/chinh-sua-danh-muc/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::post('/cap-nhat-trang-thai-danh-muc', [CategoryController::class, 'updateStatus'])->name('category.update.status');
            Route::get('/xoa-danh-muc/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

            //MA GIAM GIA
            Route::get('/ma-giam-gia', [VoucherController::class, 'index'])->name('voucher.index');
            Route::post('/cap-nhat-trang-thai-voucher', [VoucherController::class, 'updateStatus'])->name('voucher.update.status');
            Route::get('/chinh-sua-voucher/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
            Route::get('/xoa-voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
            Route::get('/them-moi-voucher', [VoucherController::class, 'create'])->name('voucher.create');
            Route::post('/store-voucher', [VoucherController::class, 'store'])->name('voucher.store');
            Route::post('/update-voucher/{id}', [VoucherController::class, 'update'])->name('voucher.update');

            //SETTING
            Route::get('/cau-hinh-chung', [AdminController::class, 'setting'])->name('admin.setting');
            Route::post('/cap-nhat-cau-hinh-chung', [AdminController::class, 'settingUpdate'])->name('admin.setting.update');
        });
    });
});
