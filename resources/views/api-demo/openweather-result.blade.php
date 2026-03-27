<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather - {{ $weatherData['name'] }}</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background: #f8f9fa;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 32px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .weather-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .city-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .country {
            font-size: 1rem;
            color: #718096;
        }

        .weather-main {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            margin-bottom: 32px;
            padding: 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            color: white;
        }

        .weather-icon {
            font-size: 4rem;
        }

        .temperature {
            font-size: 4rem;
            font-weight: 700;
        }

        .temperature-unit {
            font-size: 1.5rem;
            opacity: 0.8;
        }

        .weather-desc {
            font-size: 1.25rem;
            text-transform: capitalize;
            opacity: 0.9;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .detail-item {
            background: #f7fafc;
            padding: 16px;
            border-radius: 8px;
            text-align: center;
        }

        .detail-label {
            font-size: 0.75rem;
            color: #a0aec0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
        }

        .detail-unit {
            font-size: 0.875rem;
            color: #718096;
        }

        .actions {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
        }

        .btn {
            display: inline-block;
            padding: 10px 24px;
            background: #4299e1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #3182ce;
        }

        .api-badge {
            display: inline-block;
            margin-top: 16px;
            padding: 8px 16px;
            background: #edf2f7;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #4a5568;
        }

        .code-section {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
        }

        .code-section h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 12px;
        }

        pre {
            background: #2d3748;
            color: #e2e8f0;
            border-radius: 6px;
            padding: 16px;
            overflow-x: auto;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 1.6;
            white-space: pre;
        }

        .comment {
            color: #68d391;
        }

        code {
            color: #fbd38d;
        }

        @media (max-width: 600px) {
            .weather-main {
                flex-direction: column;
                text-align: center;
            }

            .temperature {
                font-size: 3rem;
            }

            .details-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('api-demo.openweather') }}" class="back-link">← Try another city</a>

    <div class="card">
        <div class="weather-header">
            <div class="city-name">{{ $weatherData['name'] }}</div>
            <div class="country">{{ $weatherData['sys']['country'] }}</div>
        </div>

        <div class="weather-main">
            <div class="weather-icon">
                @php
                    $icon = $weatherData['weather'][0]['icon'];
                    $icons = [
                        '01d' => '☀️', '01n' => '🌙',
                        '02d' => '⛅', '02n' => '☁️',
                        '03d' => '☁️', '03n' => '☁️',
                        '04d' => '☁️', '04n' => '☁️',
                        '09d' => '🌧️', '09n' => '🌧️',
                        '10d' => '🌦️', '10n' => '🌧️',
                        '11d' => '⛈️', '11n' => '⛈️',
                        '13d' => '❄️', '13n' => '❄️',
                        '50d' => '🌫️', '50n' => '🌫️',
                    ];
                    echo $icons[$icon] ?? '🌤️';
                @endphp
            </div>
            <div>
                <div class="temperature">
                    {{ round($weatherData['main']['temp']) }}
                    @if($weatherData['units'] == 'metric')
                        <span class="temperature-unit">°C</span>
                    @elseif($weatherData['units'] == 'imperial')
                        <span class="temperature-unit">°F</span>
                    @else
                        <span class="temperature-unit">K</span>
                    @endif
                </div>
                <div class="weather-desc">
                    {{ $weatherData['weather'][0]['description'] }}
                </div>
            </div>
        </div>

        <div class="details-grid">
            <div class="detail-item">
                <div class="detail-label">Feels Like</div>
                <div class="detail-value">
                    {{ round($weatherData['main']['feels_like']) }}°
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Humidity</div>
                <div class="detail-value">
                    {{ $weatherData['main']['humidity'] }}<span class="detail-unit">%</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Pressure</div>
                <div class="detail-value">
                    {{ $weatherData['main']['pressure'] }}<span class="detail-unit">hPa</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Wind Speed</div>
                <div class="detail-value">
                    {{ $weatherData['wind']['speed'] }}
                    @if($weatherData['units'] == 'metric')
                        <span class="detail-unit">m/s</span>
                    @else
                        <span class="detail-unit">mph</span>
                    @endif
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Min Temp</div>
                <div class="detail-value">
                    {{ round($weatherData['main']['temp_min']) }}°
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Max Temp</div>
                <div class="detail-value">
                    {{ round($weatherData['main']['temp_max']) }}°
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Visibility</div>
                <div class="detail-value">
                    {{ round($weatherData['visibility'] / 1000, 1) }}<span class="detail-unit">km</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Cloudiness</div>
                <div class="detail-value">
                    {{ $weatherData['clouds']['all'] }}<span class="detail-unit">%</span>
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('api-demo.openweather') }}" class="btn">Search Another City</a>
            <div class="api-badge">Powered by OpenWeatherMap API</div>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The OpenWeatherMap API provides comprehensive weather data. This response includes current conditions, coordinates, and detailed meteorological metrics.',
            'codeExample' => '$weatherData = $response->json();
$temp = $weatherData[\'main\'][\'temp\'];
$description = $weatherData[\'weather\'][0][\'description\'];',
            'endpoint' => 'https://api.openweathermap.org/data/2.5/weather',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://api.openweathermap.org/data/2.5/weather\', [
    \'q\' => $city,
    \'appid\' => $apiKey,
    \'units\' => $units,
]);

if ($response->successful()) {
    $weatherData = $response->json();
    return view(\'api-demo.openweather-result\', compact(\'weatherData\'));
}',
            'formattedJson' => $formattedJson
        ])
    </div>
</body>
</html>
