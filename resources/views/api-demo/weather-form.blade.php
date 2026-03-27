<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Lookup - Laravel API Demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #059669;
            --accent-color: #dc2626;
            --text-primary: #111827;
            --text-secondary: #374151;
            --text-muted: #6b7280;
            --bg-primary: #ffffff;
            --bg-secondary: #f9fafb;
            --bg-tertiary: #f3f4f6;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-secondary);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 32px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back:hover {
            color: var(--primary-dark);
        }

        .card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-secondary);
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-top: 16px;
            font-size: 0.875rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }
            .card {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ route('api-demo.index') }}" class="back">
                ← Back to demos
            </a>
            <h1 class="page-title">Weather Lookup</h1>
        </div>

        <div class="card">
            <h2 class="form-title">Current Weather Search</h2>
            <form method="POST" action="{{ route('api-demo.get-weather') }}">
                @csrf
                <div class="form-group">
                    <label for="city">City Name</label>
                    <input 
                        type="text" 
                        id="city" 
                        name="city" 
                        placeholder="e.g., London, Tokyo, New York" 
                        required
                        value="{{ old('city') }}"
                    >
                </div>
                <button type="submit" class="submit-btn">Get Weather Report</button>
            </form>

            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        @include('api-demo.response-display', [
            'description' => 'This demo uses Open-Meteo, a free weather API that doesn\'t require an API key for basic usage. It demonstrates how to handle forms and chain multiple API requests.',
            'codeExample' => '// Step 1: Geocoding (City -> Coordinates)
$geocoding = Http::get("https://geocoding-api.open-meteo.com/v1/search?name={$city}");

// Step 2: Weather (Coordinates -> Data)
$weather = Http::get("https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current_weather=true");',
            'endpoint' => 'https://api.open-meteo.com/v1/forecast',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

public function getWeather(Request $request) {
    $city = $request->city;
    
    // 1. Get Lat/Lon
    $geo = Http::get("geocoding-api.open-meteo.com/v1/search", [\'name\' => $city]);
    $loc = $geo->json()[\'results\'][0];
    
    // 2. Get Weather
    $res = Http::get("api.open-meteo.com/v1/forecast", [
        \'latitude\' => $loc[\'latitude\'],
        \'longitude\' => $loc[\'longitude\'],
        \'current_weather\' => true
    ]);
    
    return $res->json();
}',
            'formattedJson' => $formattedJson ?? '<span class="json-comment">// Submit the form to see real-time API response data here</span>'
        ])
    </div>
</body>
</html>
