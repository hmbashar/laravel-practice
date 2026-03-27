<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XKCD Comic #{{ $comic['num'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            max-width: 800px;
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .comic-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .comic-number {
            display: inline-block;
            background: #edf2f7;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            color: #4a5568;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }

        .comic-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .comic-date {
            font-size: 0.85rem;
            color: #a0aec0;
            margin-bottom: 20px;
        }

        .comic-image-container {
            text-align: center;
            margin: 30px 0;
        }

        .comic-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .comic-alt {
            background: #f7fafc;
            padding: 16px;
            border-radius: 6px;
            font-size: 0.95rem;
            color: #4a5568;
            line-height: 1.6;
            margin-top: 20px;
            font-style: italic;
        }

        .comic-alt-label {
            font-weight: 600;
            font-style: normal;
            color: #2d3748;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .nav-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #edf2f7;
            color: #4a5568;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            border: 1px solid #cbd5e0;
            transition: all 0.2s;
        }

        .nav-btn:hover:not(.disabled) {
            background: #e2e8f0;
            transform: translateY(-1px);
        }

        .nav-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .nav-btn.primary {
            background: #4299e1;
            color: white;
            border-color: #4299e1;
        }

        .nav-btn.primary:hover {
            background: #3182ce;
        }

        .jump-form {
            margin-top: 20px;
            text-align: center;
        }

        .jump-form input[type="number"] {
            width: 100px;
            padding: 8px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-right: 8px;
        }

        .jump-form button {
            padding: 8px 16px;
            background: #4299e1;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }

        .jump-form button:hover {
            background: #3182ce;
        }

        .external-link {
            display: inline-block;
            margin-top: 15px;
            color: #4299e1;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .external-link:hover {
            text-decoration: underline;
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
            margin: 20px 0;
            overflow-x: auto;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 1.6;
            white-space: pre;
        }

        .comment {
            color: #68d391;
        }

        .keyword {
            color: #63b3ed;
        }

        .string {
            color: #fbd38d;
        }

        .function {
            color: #f687b3;
        }

        @media (max-width: 600px) {
            .navigation {
                justify-content: center;
            }

            .comic-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('api-demo.index') }}" class="back-link">← Back to demos</a>

    <div class="card">
        <div class="comic-header">
            <div class="comic-number">Comic #{{ $comic['num'] }}</div>
            <h1 class="comic-title">{{ $comic['safe_title'] }}</h1>
            <div class="comic-date">
                Published: {{ \Carbon\Carbon::create($comic['year'], $comic['month'], $comic['day'])->format('F j, Y') }}
            </div>
        </div>

        <div class="comic-image-container">
            <img
                src="{{ $comic['img'] }}"
                alt="{{ $comic['alt'] }}"
                class="comic-image"
                title="{{ $comic['alt'] }}"
            >
            <div class="comic-alt">
                <span class="comic-alt-label">Alt text:</span> {{ $comic['alt'] }}
            </div>
        </div>

        <div class="navigation">
            @if($comic['num'] > 1)
                <a href="{{ route('api-demo.xkcd', $comic['num'] - 1) }}" class="nav-btn">← Previous</a>
            @else
                <span class="nav-btn disabled">← Previous</span>
            @endif

            <a href="{{ route('api-demo.xkcd') }}" class="nav-btn primary">Latest Comic</a>

            @if($comic['num'] < $latestNum)
                <a href="{{ route('api-demo.xkcd', $comic['num'] + 1) }}" class="nav-btn">Next →</a>
            @else
                <span class="nav-btn disabled">Next →</span>
            @endif
        </div>

        <div class="jump-form">
            <form method="GET" action="{{ route('api-demo.xkcd', ['num' => '']) }}" onsubmit="this.action = this.action.replace(/\/$/, '') + '/' + this.comic_number.value">
                <label for="comic_number" style="font-weight: 500; color: #2d3748;">Jump to comic:</label><br><br>
                <input
                    type="number"
                    id="comic_number"
                    name="comic_number"
                    min="1"
                    max="{{ $latestNum }}"
                    placeholder="#{{ $comic['num'] }}"
                    required
                >
                <button type="submit">Go</button>
            </form>
            <div style="margin-top: 10px; font-size: 0.85rem; color: #a0aec0;">
                Enter a number between 1 and {{ $latestNum }}
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="https://xkcd.com/{{ $comic['num'] }}/" target="_blank" class="external-link">
                View on xkcd.com ↗
            </a>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The XKCD API provides metadata for comics. This includes the image URL, title, publication date, and alt text.',
            'codeExample' => '$comic = $response->json();
$imageUrl = $comic[\'img\'];
$title = $comic[\'title\'];
$altText = $comic[\'alt\'];',
            'endpoint' => 'https://xkcd.com/info.0.json',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://xkcd.com/info.0.json\');

if ($response->successful()) {
    $comic = $response->json();
    return view(\'api-demo.xkcd\', compact(\'comic\'));
}',
            'formattedJson' => $formattedJson
        ])
    </div>
</body>
</html>
