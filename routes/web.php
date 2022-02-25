<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
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

Route::get('/todos',[todoController::class,'index'])->name('index');

Route::prefix('/todo')->group(function(){
    Route::post('/store',[todoController::class,'store']);
    Route::get('/{id}',[todoController::class,'update']);
    Route::get('/delete/{id}',[todoController::class,'destroy']);
    Route::get('/complete/{id}',[todoController::class,'complete']);
});