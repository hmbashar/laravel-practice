<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel API Demo - Learn External API Integration</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 60px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .page-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .laravel-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #ff2d20, #ff6b6b);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .demos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .demo-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
            display: block;
            position: relative;
            box-shadow: var(--shadow-sm);
        }

        .demo-card:hover {
            border-color: var(--primary-color);
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .featured-card {
            background: linear-gradient(135deg, var(--bg-primary), var(--bg-secondary));
            border: 2px solid var(--primary-color);
            position: relative;
        }

        .featured-card::after {
            content: "⭐";
            position: absolute;
            top: -8px;
            right: 16px;
            font-size: 1rem;
            background: var(--accent-color);
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            background: var(--bg-tertiary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .card-title-group {
            flex: 1;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .card-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .card-description {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid var(--border-color);
        }

        .api-source {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .view-demo {
            font-size: 0.875rem;
            color: var(--primary-color);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.2s ease;
        }

        .view-demo::after {
            content: "→";
        }

        .demo-card:hover .view-demo {
            color: var(--primary-dark);
        }

        .footer {
            text-align: center;
            padding: 40px 20px;
            background: var(--bg-primary);
            border-top: 1px solid var(--border-color);
            margin-top: 40px;
        }

        .footer-content {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .footer-content a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .footer-content a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .doc-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--primary-color);
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
            margin-top: 24px;
        }

        .doc-button:hover {
            background-color: var(--primary-dark);
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .doc-button svg {
            width: 20px;
            height: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 2rem;
            }

            .demos-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="laravel-badge">
                ⚡ Laravel 12 API Demos
            </div>
            <h1 class="page-title">Laravel API Integration Examples</h1>
            <p class="page-subtitle">Learn how to integrate external APIs in Laravel applications</p>
            <a href="{{ route('api-demo.documentation') }}" class="doc-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                View Documentation
            </a>
        </div>

        <div class="demos-grid">
            <a href="{{ route('api-demo.random-user') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">👤</div>
                    <div class="card-title-group">
                        <div class="card-title">Random User Generator</div>
                        <div class="card-subtitle">User Profile Data</div>
                    </div>
                </div>
                <div class="card-description">
                    Fetch realistic user profile data including names, emails, addresses, and profile pictures. Perfect for testing user interfaces.
                </div>
                <div class="card-footer">
                    <span class="api-source">randomuser.me</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.random-dog') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">🐕</div>
                    <div class="card-title-group">
                        <div class="card-title">Random Dog Images</div>
                        <div class="card-subtitle">Image API Integration</div>
                    </div>
                </div>
                <div class="card-description">
                    Retrieve random dog images from various breeds. Demonstrates working with image URLs and file handling.
                </div>
                <div class="card-footer">
                    <span class="api-source">dog.ceo</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.random-joke') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">😂</div>
                    <div class="card-title-group">
                        <div class="card-title">Random Jokes</div>
                        <div class="card-subtitle">Simple JSON Structure</div>
                    </div>
                </div>
                <div class="card-description">
                    Fetch random programming jokes with setup and punchline format. Ideal for learning basic JSON parsing.
                </div>
                <div class="card-footer">
                    <span class="api-source">Official Joke API</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.advice') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">💡</div>
                    <div class="card-title-group">
                        <div class="card-title">Random Advice</div>
                        <div class="card-subtitle">Text Content Handling</div>
                    </div>
                </div>
                <div class="card-description">
                    Get random life advice. Demonstrates handling APIs with text/plain content-type responses.
                </div>
                <div class="card-footer">
                    <span class="api-source">adviceslip.com</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.posts') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">📝</div>
                    <div class="card-title-group">
                        <div class="card-title">Blog Posts</div>
                        <div class="card-subtitle">REST API Collection</div>
                    </div>
                </div>
                <div class="card-description">
                    Fetch fake blog posts for testing. Demonstrates working with arrays, collections, and data pagination.
                </div>
                <div class="card-footer">
                    <span class="api-source">JSONPlaceholder</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.weather') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">🌤️</div>
                    <div class="card-title-group">
                        <div class="card-title">Weather Lookup</div>
                        <div class="card-subtitle">Chained API Calls</div>
                    </div>
                </div>
                <div class="card-description">
                    Search weather by city name. Demonstrates form handling, input validation, and chaining multiple API calls.
                </div>
                <div class="card-footer">
                    <span class="api-source">Open-Meteo</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.pokemon', 'pikachu') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">⚡</div>
                    <div class="card-title-group">
                        <div class="card-title">Pokemon Database</div>
                        <div class="card-subtitle">Dynamic Route Parameters</div>
                    </div>
                </div>
                <div class="card-description">
                    Get detailed Pokemon stats and images. Demonstrates working with dynamic route parameters and complex nested JSON.
                </div>
                <div class="card-footer">
                    <span class="api-source">PokeAPI</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.exchange-rate') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">💱</div>
                    <div class="card-title-group">
                        <div class="card-title">Currency Exchange</div>
                        <div class="card-subtitle">Large Dataset Handling</div>
                    </div>
                </div>
                <div class="card-description">
                    Get current currency exchange rates. Demonstrates handling large datasets, number formatting, and date display.
                </div>
                <div class="card-footer">
                    <span class="api-source">ExchangeRate-API</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.post-demo') }}" class="demo-card">
                <div class="card-header">
                    <div class="card-icon">📤</div>
                    <div class="card-title-group">
                        <div class="card-title">HTTP POST Demo</div>
                        <div class="card-subtitle">Form Data Submission</div>
                    </div>
                </div>
                <div class="card-description">
                    Send POST requests with form data to external APIs. Demonstrates form validation, data packaging, and response handling.
                </div>
                <div class="card-footer">
                    <span class="api-source">httpbin.org</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>

            <a href="{{ route('api-demo.openweather') }}" class="demo-card featured-card">
                <div class="card-header">
                    <div class="card-icon">🌡️</div>
                    <div class="card-title-group">
                        <div class="card-title">OpenWeatherMap</div>
                        <div class="card-subtitle">API Key Required</div>
                    </div>
                </div>
                <div class="card-description">
                    <strong style="color: #dc2626;">⚠️ Requires your own API key!</strong><br>
                    Get real weather data using your own OpenWeatherMap API key. Learn API key authentication.
                </div>
                <div class="card-footer">
                    <span class="api-source" style="background: #dbeafe; color: #1e40af;">OpenWeatherMap</span>
                    <span class="view-demo">View Demo</span>
                </div>
            </a>
        </div>

        <div class="footer">
            <div class="footer-content">
                <p>Built for classroom demonstrations • Most APIs are free • 1 demo requires your own API key</p>
            </div>
        </div>
    </div>
</body>
</html>
