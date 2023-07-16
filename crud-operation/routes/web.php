<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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


Route::get('/home',[HomeController::class,'index']);
Route::post('/upload',[HomeController::class,'upload']); 
Route::get('/show',[HomeController::class,'show']); 
Route::get('/remove/{id}',[HomeController::class,'remove']); 
Route::post('/search',[HomeController::class,'search']); 
Route::get('/edit/{id}',[HomeController::class,'edit']); 
Route::post('/update/{id}',[HomeController::class,'update']); 
