<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiDemoController extends Controller
{
    public function index()
    {
        return view('api-demo.index');
    }

    public function randomUser()
    {
        $response = Http::get('https://randomuser.me/api/');

        if ($response->successful()) {
            $user = $response->json()['results'][0];
            $formattedJson = $this->formatJson($user);
            return view('api-demo.random-user', compact('user', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch user data');
    }

    public function randomDog()
    {
        $response = Http::get('https://dog.ceo/api/breeds/image/random');

        if ($response->successful()) {
            $data = $response->json();
            $formattedJson = $this->formatJson($data);
            return view('api-demo.random-dog', compact('data', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch dog image');
    }

    public function randomJoke()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');

        if ($response->successful()) {
            $joke = $response->json();
            $formattedJson = $this->formatJson($joke);
            return view('api-demo.random-joke', compact('joke', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch joke');
    }

    public function advice()
    {
        $response = Http::get('https://api.adviceslip.com/advice');

        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $advice = $data['slip'];
            $formattedJson = $this->formatJson($data);
            return view('api-demo.advice', compact('advice', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch advice');
    }

    public function posts()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->successful()) {
            $posts = collect($response->json())->take(10);
            $formattedJson = $this->formatJson($posts->toArray());
            return view('api-demo.posts', compact('posts', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch posts');
    }

    public function weather()
    {
        return view('api-demo.weather-form');
    }

    public function getWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = urlencode($request->city);

        $geocoding = Http::get("https://geocoding-api.open-meteo.com/v1/search?name={$city}&count=1");

        if (! $geocoding->successful() || empty($geocoding->json()['results'])) {
            return back()->with('error', 'City not found');
        }

        $location = $geocoding->json()['results'][0];
        $lat = $location['latitude'];
        $lon = $location['longitude'];

        $response = Http::get("https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current_weather=true");

        if ($response->successful()) {
            $weather = $response->json();
            $cityName = $location['name'];
            $formattedJson = $this->formatJson($weather);
            return view('api-demo.weather-result', compact('weather', 'cityName', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch weather data');
    }

    public function pokeApi($pokemon = 'pikachu')
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemon}");

        if ($response->successful()) {
            $pokemonData = $response->json();
            $formattedJson = $this->formatJson($pokemonData);
            return view('api-demo.pokemon', compact('pokemonData', 'formattedJson'));
        }

        return back()->with('error', 'Pokemon not found');
    }

    public function exchangeRate()
    {
        $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');

        if ($response->successful()) {
            $rates = $response->json();
            $formattedJson = $this->formatJson($rates);
            return view('api-demo.exchange-rate', compact('rates', 'formattedJson'));
        }

        return back()->with('error', 'Failed to fetch exchange rates');
    }

    public function openWeatherForm()
    {
        return view('api-demo.openweather-form');
    }

    public function openWeatherDebug()
    {
        return view('api-demo.openweather-debug');
    }

    public function testOpenWeather(Request $request)
    {
        $apiKey = trim($request->api_key);
        $city = $request->city ?? 'London';

        $debugInfo = [];
        $debugInfo[] = '=== API Request Details ===';
        $debugInfo[] = 'URL: https://api.openweathermap.org/data/2.5/weather';
        $debugInfo[] = 'API Key: '.substr($apiKey, 0, 8).'...'.substr($apiKey, -8);
        $debugInfo[] = 'API Key Length: '.strlen($apiKey).' characters';
        $debugInfo[] = 'City: '.$city;
        $debugInfo[] = '';

        try {
            $url = 'https://api.openweathermap.org/data/2.5/weather';
            $params = [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ];

            $debugInfo[] = 'Query Parameters:';
            foreach ($params as $key => $value) {
                if ($key === 'appid') {
                    $debugInfo[] = "  {$key}: [HIDDEN FOR SECURITY]";
                } else {
                    $debugInfo[] = "  {$key}: {$value}";
                }
            }
            $debugInfo[] = '';
            $debugInfo[] = "Full URL: {$url}?".http_build_query($params);
            $debugInfo[] = '';

            $response = Http::timeout(30)->get($url, $params);

            $debugInfo[] = '=== Response Details ===';
            $debugInfo[] = 'HTTP Status Code: '.$response->status();
            $debugInfo[] = 'Response Successful: '.($response->successful() ? 'YES' : 'NO');
            $debugInfo[] = '';
            $debugInfo[] = 'Response Headers:';
            foreach ($response->headers() as $name => $values) {
                $debugInfo[] = "  {$name}: ".implode(', ', $values);
            }
            $debugInfo[] = '';
            $debugInfo[] = 'Response Body (JSON):';
            $debugInfo[] = json_encode($response->json(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        } catch (\Exception $e) {
            $debugInfo[] = '';
            $debugInfo[] = '=== ERROR ===';
            $debugInfo[] = 'Exception: '.get_class($e);
            $debugInfo[] = 'Message: '.$e->getMessage();
            $debugInfo[] = 'File: '.$e->getFile();
            $debugInfo[] = 'Line: '.$e->getLine();
        }

        return back()->with('debug_info', implode("\n", $debugInfo))->withInput();
    }

    public function getOpenWeather(Request $request)
    {
        $request->validate([
            'api_key' => 'required|string',
            'city' => 'required|string',
            'units' => 'sometimes|in:metric,imperial,standard',
        ]);

        $apiKey = trim($request->api_key);
        $city = $request->city;
        $units = $request->units ?? 'metric';

        try {
            $response = Http::timeout(30)->get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $apiKey,
                'units' => $units,
            ]);

            if ($response->successful()) {
                $weatherData = $response->json();
                $weatherData['units'] = $units;
                $formattedJson = $this->formatJson($weatherData);

                return view('api-demo.openweather-result', compact('weatherData', 'formattedJson'));
            }

            $errorData = $response->json();
            $errorCode = $response->status();

            $errorMessage = $errorData['message'] ?? 'Unknown error occurred';

            if ($errorCode === 401) {
                $error = 'Invalid API key. Please check your OpenWeatherMap API key and try again.';
            } elseif ($errorCode === 404) {
                $error = 'City not found. Please check the city name and try again.';
            } elseif ($errorCode === 429) {
                $error = 'API rate limit exceeded. Please try again later.';
            } else {
                $error = "Error ({$errorCode}): {$errorMessage}";
            }

            return back()->with('error', $error)->withInput();

        } catch (\Exception $e) {
            return back()->with('error', 'Connection error: ' . $e->getMessage())->withInput();
        }
    }

    public function xkcd($comicNum = null)
    {
        try {
            if ($comicNum === null) {
                $response = Http::get('https://xkcd.com/info.0.json');
            } else {
                $response = Http::get("https://xkcd.com/{$comicNum}/info.0.json");
            }

            if ($response->successful()) {
                $comic = $response->json();
                $formattedJson = $this->formatJson($comic);

                $latestResponse = Http::get('https://xkcd.com/info.0.json');
                $latestNum = $latestResponse->successful() ? $latestResponse->json()['num'] : $comic['num'];

                return view('api-demo.xkcd', compact('comic', 'latestNum', 'formattedJson'));
            }

            return back()->with('error', 'Comic not found');

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to fetch comic: ' . $e->getMessage());
        }
    }

    public function postDemoForm()
    {
        return view('api-demo.post-form');
    }

    public function postDemoSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:500',
            'user_type' => 'required|in:developer,designer,manager',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'user_type' => $request->user_type,
            'timestamp' => now()->toISOString(),
            'source' => 'Laravel API Demo'
        ];

        try {
            $response = Http::post('https://httpbin.org/post', $data);

            if ($response->successful()) {
                $result = $response->json();
                $formattedJson = $this->formatJson($result);
                return view('api-demo.post-result', compact('data', 'result', 'formattedJson'));
            }

            return back()->with('error', 'Failed to send POST request');

        } catch (\Exception $e) {
            return back()->with('error', 'Connection error: ' . $e->getMessage())->withInput();
        }
    }

    private function formatJson($data)
    {
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Add syntax highlighting
        $json = preg_replace('/"([^"]+)":/s', '<span class="json-key">"$1"</span>:', $json);
        $json = preg_replace('/: "([^"]*)"/s', ': <span class="json-string">"$1"</span>', $json);
        $json = preg_replace('/: (\d+)/s', ': <span class="json-number">$1</span>', $json);
        $json = preg_replace('/: (true|false)/s', ': <span class="json-boolean">$1</span>', $json);
        $json = preg_replace('/: null/s', ': <span class="json-null">null</span>', $json);
        $json = preg_replace('/([\[\]{},])/', '<span class="json-bracket">$1</span>', $json);

        return $json;
    }
}