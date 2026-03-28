<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Log;

class ApiController extends Controller
{
    function dogImage(Request $request) {
        $response = Http::get('https://dog.ceo/api/breeds/image/random');

        $data = Cache::remember('dog_image', 60, function () use ($response) {
            return $response->json();
        });
        //$data = $response->json();
        //$data = json_decode($response->json(), true);
        //dump($response->json());
        Log::error('This is error test');
        return view('dog', $data);
    }
}
