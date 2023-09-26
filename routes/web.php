<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HeaderBannerController;
use App\Http\Controllers\ProductBannerController;
use App\Http\Controllers\CategoryBannerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/admin-panel', function () {
    return view('admin.admin-dashboard');
})->name("admin-panel")->middleware("auth");

Route::resource("admin-banner" , HeaderBannerController::class)->except("show")->middleware("auth");

Route::resource("admin-category" , CategoryBannerController::class)->except("show")->middleware("auth");

Route::resource("admin-product" , ProductBannerController::class)->except("show")->middleware("auth");

Route::resource("admin-brand" , BrandController::class)->except("show")->middleware("auth");

Route::resource("admin-about" , AboutUsController::class)->except("show")->middleware("auth");

Route::resource("blog" , BlogController::class)->middleware(["auth"]);
