<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class,'index']);

Route::resource('/products',ProductController::class);
Route::resource('/orders',OrderController::class);
Route::get('/confirm/{id}',[OrderController::class,'confirm'])->name('order.confirm');
Route::get('/pending/{id}',[OrderController::class,'pending'])->name('order.pending');


//Users
Route::resource('/users',UserController::class);