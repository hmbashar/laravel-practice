<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Life Advice</title>
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

        .advice-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .advice-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .advice-icon {
            font-size: 3rem;
            margin-bottom: 24px;
        }

        .advice-text {
            font-size: 1.5rem;
            color: var(--text-primary);
            margin-bottom: 24px;
            line-height: 1.6;
            font-style: italic;
            font-weight: 500;
        }

        .advice-id {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 32px;
            background: var(--bg-tertiary);
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
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

            .advice-card {
                padding: 24px;
            }

            .advice-text {
                font-size: 1.25rem;
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
            <h1 class="page-title">Random Life Advice</h1>
        </div>

        <div class="advice-card">
            <div class="advice-icon">💡</div>
            <div class="advice-text">{{ $advice['advice'] }}</div>
            <div class="advice-id">Advice #{{ $advice['id'] }}</div>
            <a href="{{ route('api-demo.advice') }}" class="refresh-button">
                🎯 Get Another Advice
            </a>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The Advice Slip API provides random life advice. This API returns text/plain content, demonstrating how to handle different response types.',
            'codeExample' => '$data = json_decode($response->body(), true);
$advice = $data[\'slip\'];

// Access advice data
$adviceText = $advice[\'advice\'];
$adviceId = $advice[\'id\'];

// Display in Blade view
<div>{{ $adviceText }}</div>',
            'endpoint' => 'https://api.adviceslip.com/advice',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://api.adviceslip.com/advice\');

if ($response->successful()) {
    $data = json_decode($response->body(), true);
    $advice = $data[\'slip\'];

    // Process the advice data
    return view(\'api-demo.advice\', compact(\'advice\'));
} else {
    // Handle error
    return back()->with(\'error\', \'Failed to fetch advice\');
}'
        ])
    </div>
</body>
</html>
