<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Request Result - Laravel API Demo</title>
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
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

        .page-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .success-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--secondary-color);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 16px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 32px;
        }

        .card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .data-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .data-item:last-child {
            border-bottom: none;
        }

        .data-label {
            font-weight: 500;
            color: var(--text-secondary);
        }

        .data-value {
            color: var(--text-primary);
            text-align: right;
            max-width: 60%;
            word-break: break-word;
        }

        .json-block {
            background: #1f2937;
            color: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
            font-size: 0.875rem;
            line-height: 1.6;
            overflow-x: auto;
            max-height: 500px;
            overflow-y: auto;
            white-space: pre;
            border: 1px solid #374151;
        }

        .json-key {
            color: #60a5fa;
            font-weight: 500;
        }

        .json-string {
            color: #86efac;
        }

        .json-number {
            color: #fbbf24;
        }

        .json-boolean {
            color: #c084fc;
            font-weight: 500;
        }

        .json-null {
            color: #f87171;
            font-weight: 500;
        }

        .json-bracket {
            color: #d1d5db;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            margin-top: 32px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-secondary {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: var(--border-color);
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 16px;
        }

        .status-success {
            background: #dcfce7;
            color: #166534;
        }

        .status-info {
            background: #dbeafe;
            color: #1e40af;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 2rem;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .data-item {
                flex-direction: column;
                gap: 4px;
            }

            .data-value {
                text-align: left;
                max-width: 100%;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('api-demo.index') }}" class="back">
            ← Back to demos
        </a>

        <div class="page-header">
            <div class="success-badge">
                ✓ POST Request Successful
            </div>
            <h1 class="page-title">Request & Response Data</h1>
            <p style="color: var(--text-secondary);">Your form data was successfully sent to the API endpoint</p>
        </div>

        <div class="grid">
            <div class="card">
                <h2 class="card-title">
                    📤 Sent Data
                </h2>

                <div class="data-item">
                    <span class="data-label">Name</span>
                    <span class="data-value">{{ $data['name'] }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Email</span>
                    <span class="data-value">{{ $data['email'] }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">User Type</span>
                    <span class="data-value">{{ ucfirst($data['user_type']) }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Message</span>
                    <span class="data-value">{{ $data['message'] }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Timestamp</span>
                    <span class="data-value">{{ $data['timestamp'] }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Source</span>
                    <span class="data-value">{{ $data['source'] }}</span>
                </div>
            </div>

            <div class="card">
                <h2 class="card-title">
                    📥 Response Info
                </h2>

                <div class="status-indicator status-success">
                    ✓ Status: {{ $result['status_code'] ?? 200 }}
                </div>

                <div class="data-item">
                    <span class="data-label">URL</span>
                    <span class="data-value">{{ $result['url'] ?? 'N/A' }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Method</span>
                    <span class="data-value">{{ $result['method'] ?? 'POST' }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Content Type</span>
                    <span class="data-value">{{ $result['headers']['Content-Type'] ?? 'N/A' }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">User Agent</span>
                    <span class="data-value" style="font-size: 0.875rem;">{{ $result['headers']['User-Agent'] ?? 'N/A' }}</span>
                </div>

                <div class="data-item">
                    <span class="data-label">Origin IP</span>
                    <span class="data-value">{{ $result['origin'] ?? 'N/A' }}</span>
                </div>
            </div>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The httpbin.org service echoes back the data sent in the request. This is perfect for verifying that your POST requests are correctly formatted and sent.',
            'codeExample' => '$result = $response->json();
$sentData = $result[\'json\'];
$headers = $result[\'headers\'];',
            'endpoint' => 'https://httpbin.org/post',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::post(\'https://httpbin.org/post\', [
    \'name\' => $name,
    \'email\' => $email,
    // ... other data
]);

if ($response->successful()) {
    $result = $response->json();
    return view(\'api-demo.post-result\', compact(\'result\'));
}',
            'formattedJson' => $formattedJson
        ])

        <div class="action-buttons">
            <a href="{{ route('api-demo.post-demo') }}" class="btn btn-primary">
                ← Send Another Request
            </a>
            <a href="{{ route('api-demo.index') }}" class="btn btn-secondary">
                View All Demos
            </a>
        </div>
    </div>
</body>
</html>
