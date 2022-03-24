<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
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
Route::get('/admin', function(){
    return view('admin.adminIndex');
});

route::prefix('admin')->group(function(){
    route::get('/Category',function(){
        return view('admin.addCategory');
    })->name('add.category');
    route::post('/addCategory',[CategoryController::class,'store'] )->name('store.category');

    route::get('/add-product',[ProductController::class,'create'])->name('add.product');

    route::get('/add-promotion',[PromotionController::class,'create'])->name('add.promotion');
    route::post('/store-promotion',[PromotionController::class,'store'])->name(('store.promotion'));
});
