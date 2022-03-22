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

Route::get('/items', [\App\Http\Controllers\Models\ItemController::class, 'show']);
Route::post('/items', [\App\Http\Controllers\Models\ItemController::class, 'add']);
Route::get('/items/{id}', [\App\Http\Controllers\Models\ItemController::class, 'showOne']);
Route::post('/items/{id}', [\App\Http\Controllers\Models\ItemController::class, 'edit']);
Route::get('/items/delete/{id}', [\App\Http\Controllers\Models\ItemController::class, 'delete']);

Route::get('/sellers', [\App\Http\Controllers\Models\SellerController::class, 'show']);
Route::post('/sellers', [\App\Http\Controllers\Models\SellerController::class, 'add']);
Route::get('/sellers/{id}', [\App\Http\Controllers\Models\SellerController::class, 'showOne']);
Route::post('/sellers/{id}', [\App\Http\Controllers\Models\SellerController::class, 'edit']);
Route::get('/sellers/delete/{id}', [\App\Http\Controllers\Models\SellerController::class, 'delete']);

Route::get('/customers', [\App\Http\Controllers\Models\CustomerController::class, 'show']);
Route::post('/customers', [\App\Http\Controllers\Models\CustomerController::class, 'add']);
Route::get('/customers/{id}', [\App\Http\Controllers\Models\CustomerController::class, 'showOne']);
Route::post('/customers/{id}', [\App\Http\Controllers\Models\CustomerController::class, 'edit']);
Route::get('/customers/delete/{id}', [\App\Http\Controllers\Models\CustomerController::class, 'delete']);

Route::get('/prices', [\App\Http\Controllers\Models\AuctionItemController::class, 'show']);
Route::post('/prices', [\App\Http\Controllers\Models\AuctionItemController::class, 'add']);
Route::get('/prices/{id}', [\App\Http\Controllers\Models\AuctionItemController::class, 'showOne']);
Route::post('/prices/{id}', [\App\Http\Controllers\Models\AuctionItemController::class, 'edit']);
Route::get('/prices/delete/{id}', [\App\Http\Controllers\Models\AuctionItemController::class, 'delete']);


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [App\Http\Controllers\Models\UserController::class, 'show']);
    Route::get('/admin/user/{id}', [App\Http\Controllers\Models\UserController::class, 'showOne']);
    Route::post('/admin/user/{id}', [App\Http\Controllers\Models\UserController::class, 'edit']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
