<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get("/",[MainController::class, "index"]);
Route::get("/category",[MainController::class, "category"]);

Route::group(["prefix"=>"admin","as"=>"admin."], function (){
   Route::resource("category", CategoryController::class);
   Route::resource("category.product", ProductController::class)->shallow();
});
