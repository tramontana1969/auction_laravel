<?php

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
    return view('main');
});
Route::get('/auctions', [\App\Http\Controllers\Models\AuctionController::class, 'show']);
Route::post('/auctions', [\App\Http\Controllers\Models\AuctionController::class, 'add']);
Route::get('/auctions/{id}', [\App\Http\Controllers\Models\AuctionController::class, 'showOne']);
Route::post('/auctions/{id}', [\App\Http\Controllers\Models\AuctionController::class, 'edit']);
Route::get('/auctions/delete/{id}', [\App\Http\Controllers\Models\AuctionController::class, 'delete']);
