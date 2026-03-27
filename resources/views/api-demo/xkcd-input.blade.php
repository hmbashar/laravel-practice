<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XKCD Comic - Laravel API Demo</title>
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
            text-align: center;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 24px;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-secondary);
        }

        input[type="number"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            text-align: center;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-decoration: none;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            margin-top: 16px;
        }

        .btn-secondary:hover {
            background: var(--border-color);
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
            <h1 class="page-title">XKCD Comic Explorer</h1>
        </div>

        <div class="card">
            <h2 class="form-title">Find a Comic</h2>
            <form method="GET" action="{{ route('api-demo.xkcd', ['num' => '']) }}" onsubmit="this.action = this.action.replace(/\/$/, '') + '/' + this.comic_number.value">
                <div class="form-group">
                    <label for="comic_number">Enter Comic Number</label>
                    <input 
                        type="number" 
                        id="comic_number" 
                        name="comic_number" 
                        placeholder="e.g., 614, 327, 1024" 
                        required
                        min="1"
                    >
                </div>
                <button type="submit" class="btn">View Comic</button>
            </form>

            <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--border-color);">
                <p style="color: var(--text-secondary); margin-bottom: 16px;">Or just see what's new today:</p>
                <a href="{{ route('api-demo.xkcd') }}" class="btn btn-secondary">
                    🚀 View Latest Comic
                </a>
            </div>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The XKCD API provides metadata for comics. This demonstrates handling dynamic URL parameters and optional route segments.',
            'codeExample' => '// Get specific comic
$response = Http::get("https://xkcd.com/{$number}/info.0.json");

// Get latest comic
$response = Http::get("https://xkcd.com/info.0.json");',
            'endpoint' => 'https://xkcd.com/info.0.json',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

public function xkcd($comicNum = null) {
    $url = $comicNum 
        ? "https://xkcd.com/{$comicNum}/info.0.json" 
        : "https://xkcd.com/info.0.json";
        
    $response = Http::get($url);
    
    if ($response->successful()) {
        return view(\'api-demo.xkcd\', [\'comic\' => $response->json()]);
    }
}',
            'formattedJson' => $formattedJson ?? '<span class="json-comment">// Select a comic to see the API response data</span>'
        ])
    </div>
</body>
</html>
