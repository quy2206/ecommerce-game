<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;

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

route::group(['prefix' => 'admin', 'middleware'=>'CheckLoginAdmin'], function () {
    Route::get('login', [AuthController::class, 'getLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('admin.login.handle');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', function () {
        return view('admin.layout.master');
    });

    route::prefix('product')->group(function () {

        route::get('/', [ProductController::class, 'index'])->name('index.product');

        route::get('/create', [ProductController::class, 'create'])->name('add.product');
        route::post('/store', [ProductController::class, 'store'])->name('store.product');

        route::get('/{products}/edit', [ProductController::class, 'edit'])->name('edit.product');
        route::post('/update/{id}', [ProductController::class, 'update'])->name('update.product');
    });

    route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index.category');
        route::get('/create', function () {
            return view('admin.category.create');
        })->name('add.category');

        route::post('/store', [CategoryController::class, 'store'])->name('store.category');

        route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
        route::post('/update/{id}', [CategoryController::class, 'update'])->name('update.category');
        route::delete('/destroy', [CategoryController::class, 'destroy'])->name('destroy.category');

        Route::get('/restore/one/{id}', [CategoryController::class, 'restore'])->name('restore.category');
        Route::get('/restoreAll', [CategoryController::class, 'restoreAll'])->name('restoreAll.category');
    });

    route::prefix('promotion')->group(function () {
        route::get('/add-promotion', [PromotionController::class, 'create'])->name('add.promotion');
        route::post('/store-promotion', [PromotionController::class, 'store'])->name(('store.promotion'));
    });
    route::prefix('images')->group(function () {
        route::post('/create', [UploadController::class, 'store'])->name('store.image');
    });
});
Route::get('/', function () {
    return view('welcome');
});




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');composer require laravel/breeze --dev
