<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather for {{ $cityName }}</title>
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

        .weather-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .weather-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .city-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 24px;
        }

        .temperature {
            font-size: 4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .temperature-icon {
            font-size: 3rem;
        }

        .weather-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .detail-item {
            padding: 20px;
            background: var(--bg-tertiary);
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .detail-label {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .weather-code {
            background: var(--bg-tertiary);
            padding: 16px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            margin-bottom: 32px;
        }

        .weather-code-title {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .weather-code-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .weather-code-desc {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .refresh-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .refresh-button:hover {
            background: var(--primary-dark);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 2rem;
            }

            .weather-card {
                padding: 24px;
            }

            .city-name {
                font-size: 2rem;
            }

            .temperature {
                font-size: 3rem;
            }

            .weather-details {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ route('api-demo.weather') }}" class="back">
                ← Search Another City
            </a>
            <h1 class="page-title">Weather for {{ $cityName }}</h1>
        </div>

        <div class="weather-card">
            <div class="city-name">{{ $cityName }}</div>
            <div class="temperature">
                <span class="temperature-icon">🌤️</span>
                {{ round($weather['current_weather']['temperature']) }}°C
            </div>

            <div class="weather-details">
                <div class="detail-item">
                    <div class="detail-label">Wind Speed</div>
                    <div class="detail-value">{{ $weather['current_weather']['windspeed'] }} km/h</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Wind Direction</div>
                    <div class="detail-value">{{ $weather['current_weather']['winddirection'] }}°</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Time</div>
                    <div class="detail-value">{{ $weather['current_weather']['time'] }}</div>
                </div>
            </div>

            <div class="weather-code">
                <div class="weather-code-title">Weather Code</div>
                <div class="weather-code-value">{{ $weather['current_weather']['weathercode'] }}</div>
                <div class="weather-code-desc">
                    0: Clear, 1-3: Mainly clear to overcast, 45-48: Fog, 51-67: Drizzle/Rain, 71-77: Snow, 80-82: Showers, 95-99: Thunderstorm
                </div>
            </div>

            <a href="{{ route('api-demo.weather') }}" class="refresh-button">
                🌡️ Check Another City
            </a>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The Open-Meteo API provides current weather data using geocoding to convert city names to coordinates. This demonstrates chained API calls and complex data processing.',
            'codeExample' => '// First, geocode the city name
$geocoding = Http::get("https://geocoding-api.open-meteo.com/v1/search?name={$city}&count=1");
$location = $geocoding->json()[\'results\'][0];

// Then get weather data using coordinates
$response = Http::get("https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current_weather=true");
$weather = $response->json();

// Access weather data
$temperature = $weather[\'current_weather\'][\'temperature\'];
$windSpeed = $weather[\'current_weather\'][\'windspeed\'];',
            'endpoint' => 'https://api.open-meteo.com/v1/forecast',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

public function getWeather(Request $request)
{
    $request->validate([\'city\' => \'required|string\']);

    // Geocode the city
    $geocoding = Http::get("https://geocoding-api.open-meteo.com/v1/search?name={$city}&count=1");
    $location = $geocoding->json()[\'results\'][0];

    // Get weather data
    $response = Http::get("https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current_weather=true");

    if ($response->successful()) {
        $weather = $response->json();
        return view(\'api-demo.weather-result\', compact(\'weather\', \'cityName\'));
    }
}',
            'formattedJson' => $formattedJson
        ])
    </div>
</body>
</html>
