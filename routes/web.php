<?php

use App\Http\Controllers\AuthController;
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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'getRegister'])->name('register.get');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

//Route admin
Route::middleware('auth.admin')->prefix('admin')->group(function ()
{
    
});

//Route saler
Route::middleware('auth.saler')->prefix('saler')->group(function ()
{
    Route::get('/', function () {
        return view('welcome');
    });
});

//Route user
Route::middleware('auth.user')->prefix('user')->group(function ()
{
    Route::get('/', function () {
        return view('welcome');
    });
});