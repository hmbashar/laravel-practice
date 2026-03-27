<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Programming Jokes</title>
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

        .joke-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .joke-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .joke-setup {
            font-size: 1.5rem;
            color: var(--text-primary);
            margin-bottom: 24px;
            line-height: 1.4;
        }

        .joke-punchline {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 32px;
            line-height: 1.4;
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

            .joke-card {
                padding: 24px;
            }

            .joke-setup {
                font-size: 1.25rem;
            }

            .joke-punchline {
                font-size: 1.5rem;
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
            <h1 class="page-title">Random Programming Jokes</h1>
        </div>

        <div class="joke-card">
            <div class="joke-setup">{{ $joke['setup'] }}</div>
            <div class="joke-punchline">{{ $joke['punchline'] }}</div>
            <a href="{{ route('api-demo.random-joke') }}" class="refresh-button">
                😂 Get Another Joke
            </a>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The Official Joke API provides programming jokes with setup and punchline format. Perfect for learning basic JSON structure parsing.',
            'codeExample' => '$joke = $response->json();

// Access joke components
$setup = $joke[\'setup\'];
$punchline = $joke[\'punchline\'];

// Display in Blade view
<div class="setup">{{ $setup }}</div>
<div class="punchline">{{ $punchline }}</div>',
            'endpoint' => 'https://official-joke-api.appspot.com/random_joke',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://official-joke-api.appspot.com/random_joke\');

if ($response->successful()) {
    $joke = $response->json();

    // Process the joke data
    return view(\'api-demo.random-joke\', compact(\'joke\'));
} else {
    // Handle error
    return back()->with(\'error\', \'Failed to fetch joke\');
}'
        ])
    </div>
</body>
</html>
