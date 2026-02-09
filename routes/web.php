<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;




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

Route::get('/demo2', [DemoController::class, 'index']);

Route::get('/profile-entry', [DemoController::class, 'profileEntry']);
Route::get('/update', [DemoController::class, 'updateProfile']);

Route::post('/test-submit', function(Request $request) {
   $request->validate([
        'name' => 'required|min:5',
        'email' => 'required|email|max:200',        
    ]);

    return response()->json([
        'messages' => 'Contact form submitted successfully',
         'data' => $request->only('name', 'email')
    ]);
});