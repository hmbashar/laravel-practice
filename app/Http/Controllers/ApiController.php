<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    function dogImage(Request $request) {
        $response = Http::get('https://dog.ceo/api/breeds/image/random');
        //$data = json_decode($response->json(), true);
        dump($response->json());
        return view('dog', $response->json());
    }
}
