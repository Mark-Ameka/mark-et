<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketItemsController;
use App\Http\Controllers\UserController;

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

Route::get('/home', [MarketItemsController::class, 'index'])->middleware('auth');
Route::get('/', [MarketItemsController::class, 'index'])->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('item', \App\Http\Controllers\MarketItemsController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);

    Route::patch('/user/update_pass/{id}', [UserController::class, 'update_pass'])->name('user.update_pass');
    Route::get('/user/update_pass/{id}', [UserController::class, 'update_pass_index'])->name('user.update_pass_index');
});

