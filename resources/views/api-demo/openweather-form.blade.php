<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenWeatherMap API Demo</title>
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

        .subtitle {
            color: var(--text-secondary);
            margin-bottom: 24px;
        }

        .api-info {
            background: #ebf8ff;
            border-left: 4px solid #4299e1;
            padding: 16px 20px;
            margin-bottom: 24px;
            border-radius: 4px;
        }

        .api-info h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #2b6cb0;
            margin-bottom: 8px;
        }

        .api-info p {
            color: #2c5282;
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.6;
        }

        .api-info a {
            color: #2b6cb0;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .input-hint {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 6px;
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
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        .error {
            background: #fff5f5;
            border-left: 4px solid #fc8181;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: #c53030;
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
            <a href="{{ route('api-demo.index') }}" class="back">← Back to demos</a>
            <h1 class="page-title">OpenWeatherMap API</h1>
        </div>

        <div class="card">
            <p class="subtitle">This demo requires your own API key from OpenWeatherMap</p>

            <div class="api-info">
                <h3>How to get your API key:</h3>
                <p>
                    1. Visit <a href="https://openweathermap.org/api" target="_blank">OpenWeatherMap</a><br>
                    2. Sign up for a free account<br>
                    3. Go to API keys section and copy your key<br>
                    4. <a href="{{ route('api-demo.openweather-debug') }}">🔧 Test your key with our debug tool</a>
                </p>
            </div>

            @if(session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('api-demo.get-openweather') }}">
                @csrf

                <div class="form-group">
                    <label for="api_key">API Key *</label>
                    <input 
                        type="text" 
                        id="api_key" 
                        name="api_key" 
                        value="{{ old('api_key') }}"
                        placeholder="e.g., a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p"
                        required
                        autocomplete="off"
                    >
                    <div class="input-hint">
                        Your 32-character API key from OpenWeatherMap
                    </div>
                </div>

                <div class="form-group">
                    <label for="city">City Name *</label>
                    <input 
                        type="text" 
                        id="city" 
                        name="city" 
                        value="{{ old('city') }}"
                        placeholder="e.g., London, New York, Tokyo"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="units">Temperature Units</label>
                    <select id="units" name="units">
                        <option value="metric" {{ old('units') == 'metric' ? 'selected' : '' }}>Celsius (metric)</option>
                        <option value="imperial" {{ old('units') == 'imperial' ? 'selected' : '' }}>Fahrenheit (imperial)</option>
                        <option value="standard" {{ old('units') == 'standard' ? 'selected' : '' }}>Kelvin (standard)</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Get Weather</button>
            </form>
        </div>

        @include('api-demo.response-display', [
            'description' => 'OpenWeatherMap is one of the most popular weather APIs. It requires an API key passed as a query parameter (appid).',
            'codeExample' => '$response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
    \'q\' => $city,
    \'appid\' => $apiKey,
    \'units\' => $units,
]);',
            'endpoint' => 'https://api.openweathermap.org/data/2.5/weather',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://api.openweathermap.org/data/2.5/weather\', [
    \'q\' => $city,
    \'appid\' => $apiKey,
    \'units\' => $units,
]);

if ($response->successful()) {
    $weatherData = $response->json();
}',
            'formattedJson' => $formattedJson ?? '<span class="json-comment">// Submit the form with a valid API key to see real-time data</span>'
        ])
    </div>
</body>
</html>
