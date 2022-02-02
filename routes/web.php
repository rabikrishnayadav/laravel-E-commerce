<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);

Route::get('/about-us',function(){
    return view('user.about-us');
})->name('about-page');

Route::get('/contact-us',function(){
    return view('user.contact-us');
})->name('contact-page');

Route::get('/product-page',[AdminController::class,'productPage'])->name('product-page');

Route::get('/product',[AdminController::class,'product'])->name('product');
Route::post('/upload-product',[AdminController::class,'uploadProduct'])->name('upload_product');

Route::get('/show-product',[AdminController::class,'showProduct'])->name('show-product');

Route::get('/delete_product/{id}',[AdminController::class,'deleteProduct']);

Route::get('/update_product/{id}',[AdminController::class,'updateProduct']);

Route::post('/edit_product/{id}',[AdminController::class,'editProduct']);

Route::get('/search',[HomeController::class,'searchProduct']);
