<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Carbon\Doctrine\CarbonDoctrineType;
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

Route::get("/", [ProductController::class, "index"])->name("home");
Route::get("/login", function(){
    return view("login", ["login_token" => false]);
})->name("login");
Route::get("/register", function(){
    return view("register", ["login_token" => false]);
})->name("register");
Route::post("/login-user", [UserController::class, "login"])->name("login.user");
Route::post("/register-user", [UserController::class, "registerNewUser"])->name("register.user");
Route::get("/logout", [UserController::class, "logout"])->name("logout");
Route::get("/product/detail/{product}", [ProductController::class, "getProductDetail"])->name("product.detail");
Route::post("/add-to-cart/{product}", [CartController::class, "addToCart"])->name("cart.add");
Route::get("/my-cart", [CartController::class, "show"])->name("cart");
Route::delete("/my-cart/delete/{cart}", [CartController::class, "delete"])->name("cart.delete");
Route::post("/my-cart/update-show/{cart}", [CartController::class, "showUpdate"])->name("cart.update.show");
Route::post("/my-cart/update/{cart}", [CartController::class, "update"])->name("cart.update");
Route::get("/my-cart/checkout", [TransactionController::class, "addToTransaction"])->name("checkout");
Route::get("transaction-history", [TransactionController::class, "show"])->name("transaction");
Route::get("/category/show", [CategoryController::class, "show"])->name("category.show");
Route::get("/category/add/show", [CategoryController::class, "showAdd"])->name("category.add.show");
Route::post("/category/add", [CategoryController::class, "addNewShow"])->name("category.add");
Route::delete("/category/delete/{category}", [CategoryController::class, "deleteCategory"])->name("delete.category");
Route::get("/category/edit/show/{category}", [CategoryController::class, "showEdit"])->name("category.edit.show");
Route::post("/category/edit/{category}", [CategoryController::class, "editCategory"])->name("category.edit");
Route::get("/product/show", [ProductController::class, "getAll"])->name("product.show");
Route::delete("/product/delete/{product}", [ProductController::class, "deleteProduct"])->name("product.delete");
Route::get("/product/add/show", [ProductController::class, "addNewShow"])->name("product.add.show");
Route::post("/product/add", [ProductController::class, "addNewProduct"])->name("product.add");
Route::get("/product/edit/show/{product}", [ProductController::class, "editShow"])->name("product.edit.show");
Route::post("/product/edit/{product}", [ProductController::class, "editProduct"])->name("product.edit");
Route::post("/search", [ProductController::class, "searchProduct"])->name("product.search");