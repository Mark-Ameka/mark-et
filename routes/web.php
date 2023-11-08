<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketItemsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;


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

Route::get('/home', [MarketItemsController::class, 'index'])->middleware('preventBack', 'auth');
Route::get('/', [MarketItemsController::class, 'index'])->middleware('preventBack', 'auth');

Auth::routes();

Route::middleware('auth', 'preventBack')->group(function(){
    // resource routes for user and market_items
    Route::resource('item', \App\Http\Controllers\MarketItemsController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);

    // search route
    Route::get('/', [MarketItemsController::class, 'search'])->name('item.search');

    //my market
    Route::get('/mymarket_search', [MarketItemsController::class, 'mymarket_search'])->name('item.mymarket_search');
    Route::get('/my_market', [MarketItemsController::class, 'mymarket_index'])->name('item.mymarket_index');

    // for update user password
    Route::patch('/user/update_pass/{id}', [UserController::class, 'update_pass'])->name('user.update_pass');

    // for update user profile
    Route::patch('/user/update_profile_pic/{id}', [UserController::class, 'update_profile_pic'])->name('user.update_profile_pic');
    Route::patch('/user/remove_profile_pic/{id}', [UserController::class, 'remove_profile_pic'])->name('user.remove_profile_pic');


    Route::post('/set_pagination', function(\Illuminate\Http\Request $request) {
        Session::put('pagination', $request->input('pagination'));
        return back();
    })->name('set_pagination');


});

