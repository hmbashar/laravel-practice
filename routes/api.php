<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Demo2Controller;


Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', 
    function () {
        return response()->json([
            'message' => 'Login route only post method is allowed',
        ]);
    }
)->name('login');


Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');


Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');


Route::get('/admin', [Demo2Controller::class, 'adminDashbaord'])->middleware('auth:sanctum');
Route::get('/editor', [Demo2Controller::class, 'editorContent'])->middleware('auth:sanctum');
Route::get('/manager', [Demo2Controller::class, 'managerReports'])->middleware('auth:sanctum');
Route::get('/customer', [Demo2Controller::class, 'customerDashboard'])->middleware('auth:sanctum');
Route::get('/viewer', [Demo2Controller::class, 'viewerDashboard'])->middleware('auth:sanctum');



Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
// Route::put('/products/{product}', [ProductController::class, 'update']);
// Route::patch('/products/{product}', [ProductController::class, 'update']);

Route::match(['put', 'patch'], '/products/{product}', [ProductController::class, 'update']);


Route::apiResource('/orders', OrderController::class);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/person', [DemoController::class, 'person']);

Route::get('/hello', [GreetingsController::class, 'sayHello']);
