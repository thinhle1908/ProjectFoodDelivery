<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
Route::middleware(['auth.saler'])->prefix('saler')->group(function ()
{
    Route::get('/products', [ProductController::class, 'index'])->name('products.get');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    Route::get('/create-product', [ProductController::class, 'create'])->name('products.create');
    Route::post('/create-product', [ProductController::class, 'store'])->name('products.create.post');
});

//Route user
// Route::middleware('auth.user')->prefix('user')->group(function ()
// {
//     Route::get('/', function () {
//         return view('welcome');
//     });
// });