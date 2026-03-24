<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\ProductController;



Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
// Route::put('/products/{product}', [ProductController::class, 'update']);
// Route::patch('/products/{product}', [ProductController::class, 'update']);

Route::match(['put', 'patch'], '/products/{product}', [ProductController::class, 'update']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/person', [DemoController::class, 'person']);

Route::get('/hello', [GreetingsController::class, 'sayHello']);
