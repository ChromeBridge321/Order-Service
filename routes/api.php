<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use MongoDB\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->middleware(['api','jwt.verify'])->group(function(){
    Route::prefix('orders')->group(function(){
        Route::get('/', [OrderController::class,'index']);
        Route::post('/', [OrderController::class,'store']);
        Route::get('/{id}', [OrderController::class,'show']);
        Route::put('/{id}', [OrderController::class,'update']);
        Route::delete('/{id}', [OrderController::class,'destroy']);
    });
});
