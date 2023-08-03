<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\shelfController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function(){
    Route::resource("box", BoxController::class);
    Route::resource('store', StoreController::class);
    
    Route::resource('tracking', TrackingController::class);
    // Route::resource("shelf" )
    Route::get('shelf/{shelf}', [shelfController::class , "show"])->name('shelf.show');
});