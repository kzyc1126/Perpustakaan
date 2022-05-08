<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Middleware;

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

Route::middleware('auth')->group(function(){
    Route::resource('/', BookController::class);
    Route::get('/tambahbuku', [BookController::class,'create']);
    Route::post('/tambahbuku',[BookController::class,'store']);
    Route::post('/tambahbuku',[BookController::class,'store']);
    Route::get('/{id}/edit', [BookController::class,'edit']);
    Route::put('',[BookController::class,'update'])->name('book.update');
});


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);