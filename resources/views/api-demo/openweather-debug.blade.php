<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test OpenWeatherMap API</title>
    <style>
        body {
            font-family: monospace;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }
        h1 { color: #333; }
        .info {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        pre {
            background: #263238;
            color: #aed581;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: monospace;
        }
        .debug-btn {
            background: #2196F3;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .debug-btn:hover { background: #1976D2; }
        .error { color: #f44336; }
        .success { color: #4caf50; }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #2196F3;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('api-demo.index') }}" class="back-link">← Back to demos</a>
        
        <h1>🔧 OpenWeatherMap API Debugger</h1>
        
        <div class="info">
            <strong>Test your API key directly</strong><br>
            This tool will show you the exact request being made and the response received.
        </div>

        @if(session('debug_info'))
            <h3>Debug Information:</h3>
            <pre>{{ session('debug_info') }}</pre>
        @endif

        <form method="POST" action="{{ route('api-demo.openweather-debug') }}">
            @csrf
            
            <label>API Key:</label>
            <input type="text" name="api_key" value="{{ old('api_key') }}" placeholder="Your 32-character API key">
            
            <label>City:</label>
            <input type="text" name="city" value="{{ old('city', 'London') }}" placeholder="City name">
            
            <button type="submit" class="debug-btn">Test API Call</button>
        </form>
    </div>
</body>
</html>
