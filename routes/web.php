<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DiscountAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderSalerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusAdminController;
use App\Http\Controllers\Variation_OptionController;
use App\Http\Controllers\VariationController;
use App\Models\Variation_Option;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/item-details/{id}', [HomeController::class, 'itemDetails'])->name('item.details');


Route::get('/about', function () {
    return view('about');
})->name('about');




//Authentication User
//Register
Route::get('/register', [AuthController::class, 'GetUserRegister'])->name('register.user.get');
Route::post('/register', [AuthController::class, 'PostUserRegister'])->name('register.user.post');
//Login
Route::get('/login', [AuthController::class, 'GetUserLogin'])->name('login.user.get');
Route::post('/login', [AuthController::class, 'Login'])->name('login.user.post');

//Authentication saler
//Register
Route::get('/register-saler', [AuthController::class, 'GetSalerRegister'])->name('register.saler.get');
Route::post('/register-saler', [AuthController::class, 'PostSalerRegister'])->name('register.saler.post');
//Login
Route::get('/login-saler', [AuthController::class, 'GetSalerLogin'])->name('login.saler.get');
Route::post('/login-saler', [AuthController::class, 'Login'])->name('login.user.post');

//Authentication admin
//Register
Route::get('/register-admin', [AuthController::class, 'GetAdminRegister'])->name('register.admin.get');
Route::post('/register-admin', [AuthController::class, 'PostAdminRegister'])->name('register.admin.post');
//Login
Route::get('/login-admin', [AuthController::class, 'GetAdminLogin'])->name('login.admin.get');
Route::post('/login-admin', [AuthController::class, 'Login'])->name('login.user.post');


//Logout
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout.get');

//Route admin
Route::middleware('auth.admin')->prefix('admin')->group(function () {
});

//Route saler
Route::middleware(['auth.saler'])->prefix('saler')->group(function () {
    Route::get('/home', function () {
        return view('salerHome');
    })->name('salerHome');
    //Product
    Route::get('/products', [ProductController::class, 'index'])->name('products.get');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    Route::get('/create-product', [ProductController::class, 'create'])->name('products.create');
    Route::post('/create-product', [ProductController::class, 'store'])->name('products.create.post');
    Route::get('/edit-product/{id}', [ProductController::class, 'show'])->name('products.create.post');
    Route::post('/edit-product/{id}', [ProductController::class, 'update'])->name('products.create.post');
    //Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.get');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('products.delete');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('category.create.post');
    Route::get('/edit-category/{id}', [CategoryController::class, 'show'])->name('category.create.post');
    Route::post('/edit-category/{id}', [CategoryController::class, 'update'])->name('category.create.post');
    //Variation
    Route::get('/variation', [VariationController::class, 'index'])->name('variation.get');
    Route::get('/create-variation', [VariationController::class, 'create'])->name('variation.create');
    Route::post('/create-variation', [VariationController::class, 'store'])->name('variation.create.post');
    Route::get('/delete-variation/{id}', [VariationController::class, 'destroy'])->name('variation.delete');
    Route::get('/edit-variation/{id}', [VariationController::class, 'show'])->name('variation.create.post');
    Route::post('/edit-variation/{id}', [VariationController::class, 'update'])->name('variation.create.post');
    //Variation Option
    Route::get('/variation/{variation_id}/variation-option/', [Variation_OptionController::class, 'show'])->name('variation-option.get');
    Route::get('/variation/{variation_id}/create-variation-option/', [Variation_OptionController::class, 'create'])->name('create.variation-option.get');
    Route::post('/variation/{variation_id}/create-variation-option/', [Variation_OptionController::class, 'store'])->name('create.variation-option.post');
    Route::get('/variation/{variation_id}/delete-variation-option/{id}', [Variation_OptionController::class, 'destroy'])->name('delete.variation-option.get');
    Route::get('/variation/{variation_id}/edit-variation-option/{id}', [Variation_OptionController::class, 'edit'])->name('edit.variation-option.get');
    Route::post('/variation/{variation_id}/edit-variation-option/{id}', [Variation_OptionController::class, 'update'])->name('edit.variation-option.post');
    //Item 
    Route::get('/product/{product_id}/items', [ItemController::class, 'show'])->name('item.get');
    Route::get('/product/{product_id}/create-item', [ItemController::class, 'create'])->name('create.item.get');
    Route::post('/product/{product_id}/create-item', [ItemController::class, 'store'])->name('create.item.post');
    Route::get('/product/{product_id}/delete-item/{id}', [ItemController::class, 'destroy'])->name('create.item.post');
    Route::get('/product/{product_id}/edit-item/{id}', [ItemController::class, 'edit'])->name('edit.item.get');
    Route::post('/product/{product_id}/edit-item/{id}', [ItemController::class, 'update'])->name('edit.item.post');
    //Order
    Route::get('/orders',[OrderSalerController::class,'index'])->name('saler.orders');
    Route::get('/order-details/{id}',[OrderSalerController::class,'showOrderDetails'])->name('saler.order-details');
    //Discount
    Route::get('discount',[DiscountAdminController::class,'index'])->name('discount.saler');
    
});

Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('adminDashboard');
    })->name('adminDashBoard');
    //Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.get');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('category.create.post');
    Route::get('/edit-category/{id}', [CategoryController::class, 'show'])->name('category.create.post');
    Route::post('/edit-category/{id}', [CategoryController::class, 'update'])->name('category.create.post');
    //Order
    Route::get('orders',[OrderAdminController::class,'index'])->name('order.admin');
    //Status
    Route::get('status',[StatusAdminController::class,'index'])->name('status.admin');
    //Discount
    Route::get('discount',[DiscountAdminController::class,'index'])->name('discount.admin');
    
});
Route::middleware(['auth.user'])->group(function () {
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('addCart');
    Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
    Route::delete('/delete-cart', [CartController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckOutController::class, 'checkOut'])->name('post.checkout');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
});
