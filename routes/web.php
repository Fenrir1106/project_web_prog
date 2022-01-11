<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthLogin;
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
Route::middleware([AuthLogin::class])->group(function () {
    Route::get("/login", function(){
        return view("login", ["login_token" => false]);
    })->name("login")->middleware("auth_login");
    Route::get("/register", function(){
        return view("register", ["login_token" => false]);
    })->name("register");
});
Route::post("/login-user", [UserController::class, "login"])->name("login.user");
Route::post("/register-user", [UserController::class, "registerNewUser"])->name("register.user");
Route::get("/logout", [UserController::class, "logout"])->name("logout");
Route::get("/product/detail/{product}", [ProductController::class, "getProductDetail"])->name("product.detail");
Route::post("/add-to-cart/{product}", [CartController::class, "addToCart"])->name("cart.add");
Route::get("/my-cart", [CartController::class, "show"])->name("cart")->middleware("auth_role:member");
Route::delete("/my-cart/delete/{cart}", [CartController::class, "delete"])->name("cart.delete");
Route::post("/my-cart/update/show/{cart}", [CartController::class, "showUpdate"])->name("cart.update.show");
Route::post("/my-cart/update/{cart}", [CartController::class, "update"])->name("cart.update")->middleware("auth_role:member");
Route::get("/my-cart/checkout", [TransactionController::class, "addToTransaction"])->name("checkout");
Route::get("transaction-history", [TransactionController::class, "show"])->name("transaction")->middleware("auth_role:member");
Route::get("/category/show", [CategoryController::class, "show"])->name("category.show")->middleware("auth_role:admin");
Route::get("/category/add/show", [CategoryController::class, "showAdd"])->name("category.add.show")->middleware("auth_role:admin");
Route::post("/category/add", [CategoryController::class, "addNewShow"])->name("category.add");
Route::delete("/category/delete/{category}", [CategoryController::class, "deleteCategory"])->name("delete.category");
Route::get("/category/edit/show/{category}", [CategoryController::class, "showEdit"])->name("category.edit.show")->middleware("auth_role:admin");
Route::post("/category/edit/{category}", [CategoryController::class, "editCategory"])->name("category.edit");
Route::get("/product/show", [ProductController::class, "getAll"])->name("product.show")->middleware("auth_role:admin");
Route::delete("/product/delete/{product}", [ProductController::class, "deleteProduct"])->name("product.delete");
Route::get("/product/add/show", [ProductController::class, "addNewShow"])->name("product.add.show")->middleware("auth_role:admin");
Route::post("/product/add", [ProductController::class, "addNewProduct"])->name("product.add");
Route::get("/product/edit/show/{product}", [ProductController::class, "editShow"])->name("product.edit.show")->middleware("auth_role:admin");
Route::post("/product/edit/{product}", [ProductController::class, "editProduct"])->name("product.edit");
Route::post("/search", [ProductController::class, "searchProduct"])->name("product.search");