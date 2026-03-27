<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiDemoController;



Route::get('/hello', [GreetingsController::class, 'sayHello']);


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

Route::get('/upload', [FileUploadController::class, 'index'])->name('upload');
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload.submit');


Route::get('/dog-image', [ApiController::class, 'dogImage']);






Route::prefix('api-demo')->group(function () {
    Route::get('/documentation', function () {
        return view('api-demo.documentation');
    })->name('api-demo.documentation');

    Route::get('/', [ApiDemoController::class, 'index'])->name('api-demo.index');
    Route::get('/random-user', [ApiDemoController::class, 'randomUser'])->name('api-demo.random-user');
    Route::get('/random-dog', [ApiDemoController::class, 'randomDog'])->name('api-demo.random-dog');
    Route::get('/random-joke', [ApiDemoController::class, 'randomJoke'])->name('api-demo.random-joke');
    Route::get('/advice', [ApiDemoController::class, 'advice'])->name('api-demo.advice');
    Route::get('/posts', [ApiDemoController::class, 'posts'])->name('api-demo.posts');
    Route::get('/weather', [ApiDemoController::class, 'weather'])->name('api-demo.weather');
    Route::post('/weather', [ApiDemoController::class, 'getWeather'])->name('api-demo.get-weather');
    Route::get('/pokemon/{pokemon?}', [ApiDemoController::class, 'pokeApi'])->name('api-demo.pokemon');
    Route::get('/exchange-rate', [ApiDemoController::class, 'exchangeRate'])->name('api-demo.exchange-rate');
    Route::get('/xkcd/{num?}', [ApiDemoController::class, 'xkcd'])->name('api-demo.xkcd');
    Route::get('/openweather', [ApiDemoController::class, 'openWeatherForm'])->name('api-demo.openweather');
    Route::post('/openweather', [ApiDemoController::class, 'getOpenWeather'])->name('api-demo.get-openweather');
    Route::get('/openweather/debug', [ApiDemoController::class, 'openWeatherDebug'])->name('api-demo.openweather-debug');
    Route::post('/openweather/debug', [ApiDemoController::class, 'testOpenWeather'])->name('api-demo.test-openweather');
    Route::get('/post-demo', [ApiDemoController::class, 'postDemoForm'])->name('api-demo.post-demo');
    Route::post('/post-demo', [ApiDemoController::class, 'postDemoSubmit'])->name('api-demo.post-submit');
});