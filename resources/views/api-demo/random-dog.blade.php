<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Dog Images</title>
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

        .dog-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 32px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .dog-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .dog-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 12px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-md);
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

            .dog-card {
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
            <h1 class="page-title">Random Dog Images</h1>
        </div>

        <div class="dog-card">
            <img src="{{ $data['message'] }}" alt="Random Dog" class="dog-image">
            <a href="{{ route('api-demo.random-dog') }}" class="refresh-button">
                🐕 Get Another Dog
            </a>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The Dog CEO API provides random dog images from various breeds. Perfect for testing image handling and URL processing.',
            'codeExample' => '$data = $response->json();

// Get the image URL
$dogImage = $data[\'message\'];

// Display in Blade view
<img src="{{ $dogImage }}" alt="Random Dog">',
            'endpoint' => 'https://dog.ceo/api/breeds/image/random',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://dog.ceo/api/breeds/image/random\');

if ($response->successful()) {
    $data = $response->json();

    // Process the image URL
    return view(\'api-demo.random-dog\', compact(\'data\'));
} else {
    // Handle error
    return back()->with(\'error\', \'Failed to fetch dog image\');
}'
        ])
    </div>
</body>
</html>
