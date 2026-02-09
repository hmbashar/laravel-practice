<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/me', [DemoController::class, 'me']);
Route::get('/greet/{name?}', [DemoController::class, 'greet']);

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::post('/', [HomeController::class, 'submit']);

// Route::view('/about', 'home.about');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');



Route::get('/article', [DemoController::class, 'article']);
Route::get('/articles', [DemoController::class, 'articles']);
Route::get('/demo', [DemoController::class, 'demo']);
