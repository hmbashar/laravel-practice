<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingsController extends Controller
{
    function sayHello (Request $request) {
      $message = [
        'message' => 'Hello, World!'
      ];

      return response()->json($message);
    }
}
