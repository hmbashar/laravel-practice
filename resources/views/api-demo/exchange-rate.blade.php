<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Exchange Rates</title>
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

        .exchange-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .exchange-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .base-currency {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--bg-tertiary);
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .last-updated {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .rates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .rate-item {
            background: var(--bg-tertiary);
            padding: 20px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            text-align: center;
            transition: all 0.2s ease;
        }

        .rate-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
            border-color: var(--primary-color);
        }

        .currency-code {
            font-weight: 700;
            color: var(--text-primary);
            font-size: 1.125rem;
            margin-bottom: 8px;
        }

        .rate-value {
            color: var(--primary-color);
            font-size: 1.25rem;
            font-weight: 600;
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
            margin: 0 auto;
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

            .exchange-card {
                padding: 24px;
            }

            .rates-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 12px;
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
            <h1 class="page-title">Currency Exchange Rates</h1>
        </div>

        <div class="exchange-card">
            <div class="card-header">
                <h2 class="card-title">Current Exchange Rates</h2>
                <div class="base-currency">
                    💱 Base Currency: {{ $rates['base'] }}
                </div>
                <div class="last-updated">
                    Last updated: {{ date('Y-m-d H:i:s', $rates['time_last_updated']) }}
                </div>
            </div>

            <div class="rates-grid">
                @php
                    $popularCurrencies = ['BDT', 'EUR', 'GBP', 'JPY', 'AUD', 'CAD', 'CHF', 'CNY', 'INR', 'MXN', 'BRL', 'KRW', 'SGD'];
                @endphp

                @foreach($popularCurrencies as $currency)
                    @if(isset($rates['rates'][$currency]))
                        <div class="rate-item">
                            <div class="currency-code">{{ $currency }}</div>
                            <div class="rate-value">{{ number_format($rates['rates'][$currency], 4) }}</div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div style="text-align: center;">
                <a href="{{ route('api-demo.exchange-rate') }}" class="refresh-button">
                    🔄 Refresh Rates
                </a>
            </div>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The ExchangeRate-API provides current currency exchange rates with USD as base currency. This demonstrates handling large datasets, number formatting, and date/time processing.',
            'codeExample' => '$rates = $response->json();

// Access exchange data
$baseCurrency = $rates[\'base\'];
$lastUpdated = $rates[\'time_last_updated\'];
$exchangeRates = $rates[\'rates\'];

// Format and display rates
foreach ($exchangeRates as $currency => $rate) {
    echo "{$currency}: " . number_format($rate, 4) . "\\n";
}

// Get specific rate
$eurRate = $rates[\'rates\'][\'EUR\'];',
            'endpoint' => 'https://api.exchangerate-api.com/v4/latest/USD',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://api.exchangerate-api.com/v4/latest/USD\');

if ($response->successful()) {
    $rates = $response->json();

    // Process the exchange rates
    return view(\'api-demo.exchange-rate\', compact(\'rates\'));
} else {
    // Handle error
    return back()->with(\'error\', \'Failed to fetch exchange rates\');
}'
        ])
    </div>
</body>
</html>
