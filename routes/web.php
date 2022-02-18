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
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CartController;

//AUTH
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

//TRANG CHU
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/gio-hang', [HomeController::class, 'cartHome'])->name('home.cart');

//SAN PHAM
Route::get('/danh-muc/{catID}', [ProductController::class, 'getProductByCat'])->name('product.cat');
Route::get('/san-pham/{proID}', [ProductController::class, 'getDetailProduct'])->name('product.detail');

//GIO HANG
Route::post('/store-cart', [CartController::class, 'storeCart'])->name('cart.store');
Route::post('/load-cart-ajax', [CartController::class, 'loadCartAjax'])->name('cart.load.ajax');
Route::post('/load-cart-table-ajax', [CartController::class, 'loadCartTableAjax'])->name('cart.table.load.ajax');
Route::post('/load-cart-total-ajax', [CartController::class, 'loadCartTotalAjax'])->name('cart.total.load.ajax');
Route::post('/cart-delete-product', [CartController::class, 'cartDeleteProduct'])->name('cart.delete.product');
Route::post('/update-qty-product', [CartController::class, 'updateQtyProduct'])->name('update.qty.product');
Route::post('/add-voucher', [CartController::class, 'addVoucher'])->name('voucher.add');
Route::get('/checkout', [CartController::class, 'checkout'])->name('home.checkout');


//HOA DON


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
            Route::post('/get-category', [CategoryController::class, 'getCategory'])->name('category.get.category');

            //MA GIAM GIA
            Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');
            Route::post('/cap-nhat-trang-thai-voucher', [VoucherController::class, 'updateStatus'])->name('voucher.update.status');
            Route::get('/chinh-sua-voucher/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
            Route::get('/xoa-voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
            Route::get('/them-moi-voucher', [VoucherController::class, 'create'])->name('voucher.create');
            Route::post('/store-voucher', [VoucherController::class, 'store'])->name('voucher.store');
            Route::post('/update-voucher/{id}', [VoucherController::class, 'update'])->name('voucher.update');

            //SAN PHAM
            Route::get('/quan-li-san-pham', [ProductController::class, 'index'])->name('product.index');
            Route::post('/cap-nhat-trang-thai-san-pham', [ProductController::class, 'updateStatus'])->name('product.update.status');
            Route::post('/cap-nhat-highlights-san-pham', [ProductController::class, 'updateHighLights'])->name('product.update.highlights');
            Route::get('/chinh-sua-san-pham/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::get('/xoa-san-pham/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
            Route::get('/them-moi-san-pham', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store-san-pham', [ProductController::class, 'store'])->name('product.store');
            Route::post('/update-san-pham/{id}', [ProductController::class, 'update'])->name('product.update');

            //CHIA SE
            Route::get('/crawl/cayvahoa', [ArticleController::class, 'crawlCayvahoa'])->name('crawl.cayvahoa');
            //NEWS
            Route::get('/quan-li-bai-viet', [ArticleController::class, 'index'])->name('news.manage');
            Route::post('/cap-nhat-trang-thai-tin-tuc', [ArticleController::class, 'updateStatus'])->name('news.update.status');
            Route::get('/chinh-sua-tin-tuc/{id}', [ArticleController::class, 'edit'])->name('news.edit');
            Route::get('/xoa-tin-tuc/{id}', [ArticleController::class, 'destroy'])->name('news.destroy');
            Route::get('/them-moi-tin-tuc', [ArticleController::class, 'create'])->name('news.create');
            Route::post('/store-tin-tuc', [ArticleController::class, 'store'])->name('news.store');
            Route::post('/update-tin-tuc/{id}', [ArticleController::class, 'update'])->name('news.update');

            //NEWS
            Route::get('/quan-li-dich-vu', [ServiceController::class, 'index'])->name('service.manage');
            Route::post('/cap-nhat-trang-thai-dich-vu', [ServiceController::class, 'updateStatus'])->name('service.update.status');
            Route::get('/chinh-sua-dich-vu/{id}', [ServiceController::class, 'edit'])->name('service.edit');
            Route::get('/xoa-dich-vu/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
            Route::get('/them-moi-dich-vu', [ServiceController::class, 'create'])->name('service.create');
            Route::post('/store-dich-vu', [ServiceController::class, 'store'])->name('service.store');
            Route::post('/update-dich-vu/{id}', [ServiceController::class, 'update'])->name('service.update');

            //LOGO
            Route::get('/{type}', [ImageController::class, 'imageType'])->name('image.type');
            Route::post('/update-hinh-anh/{id}', [ImageController::class, 'update'])->name('image.update');

            //Hinh anh
            Route::get('/hinh-anh/{typeList}', [ImageController::class, 'listImage'])->name('image.list');
            Route::get('/them-moi-hinh-anh/{type}', [ImageController::class, 'create'])->name('image.create');
            Route::post('store-image', [ImageController::class, 'store'])->name('image.store');
            Route::post('/cap-nhat-trang-thai-hinh-anh', [ImageController::class, 'updateStatus'])->name('image.update.status');
            Route::get('/xoa-hinh-anh/{id}', [ImageController::class, 'destroy'])->name('image.destroy');
            Route::get('/chinh-sua-hinh-anh/{id}', [ImageController::class, 'edit'])->name('image.edit');

            //SETTING
            Route::get('/cau-hinh-chung', [AdminController::class, 'setting'])->name('admin.setting');
            Route::post('/cap-nhat-cau-hinh-chung', [AdminController::class, 'settingUpdate'])->name('admin.setting.update');
        });
    });
});
