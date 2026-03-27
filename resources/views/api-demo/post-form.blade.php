<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTP POST Demo - Laravel API Demo</title>
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

        .page-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 32px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .help-text {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .submit-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 100%;
        }

        .submit-button:hover {
            background: var(--primary-dark);
        }

        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .field-error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 4px;
            display: none;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }
            .page-title {
                font-size: 2rem;
            }
            .form-card {
                padding: 24px;
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
            <h1 class="page-title">HTTP POST Request Demo</h1>
            <p class="page-subtitle">Learn how to send POST requests with form data</p>
        </div>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-card">
            <form id="postForm" action="{{ route('api-demo.post-submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Name *</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input"
                        value="{{ old('name') }}"
                        required
                        maxlength="100"
                        placeholder="Enter your full name"
                    >
                    <div class="field-error" id="name-error"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email') }}"
                        required
                        maxlength="100"
                        placeholder="your.email@example.com"
                    >
                    <div class="field-error" id="email-error"></div>
                </div>

                <div class="form-group">
                    <label for="user_type" class="form-label">User Type *</label>
                    <select id="user_type" name="user_type" class="form-select" required>
                        <option value="">Select your role</option>
                        <option value="developer" {{ old('user_type') == 'developer' ? 'selected' : '' }}>Developer</option>
                        <option value="designer" {{ old('user_type') == 'designer' ? 'selected' : '' }}>Designer</option>
                        <option value="manager" {{ old('user_type') == 'manager' ? 'selected' : '' }}>Manager</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Message *</label>
                    <textarea
                        id="message"
                        name="message"
                        class="form-textarea"
                        required
                        maxlength="500"
                        placeholder="Enter your message here..."
                    >{{ old('message') }}</textarea>
                    <div style="display: flex; justify-content: space-between; margin-top: 4px;">
                        <div class="field-error" id="message-error" style="margin: 0;"></div>
                        <span id="charCount" style="font-size: 0.875rem; color: var(--text-muted);">0 / 500</span>
                    </div>
                </div>

                <button type="submit" class="submit-button" id="submitBtn">
                    Send POST Request
                </button>
            </form>
        </div>

        @include('api-demo.response-display', [
            'description' => 'This demo sends a POST request to httpbin.org, which echoes back the received data. It demonstrates form validation and HTTP client usage in Laravel.',
            'codeExample' => '$response = Http::post("https://httpbin.org/post", [
    \'name\' => $request->name,
    \'email\' => $request->email,
    \'message\' => $request->message,
    \'user_type\' => $request->user_type,
]);',
            'endpoint' => 'https://httpbin.org/post',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$data = [
    \'name\' => $request->name,
    \'email\' => $request->email,
    \'message\' => $request->message,
    \'user_type\' => $request->user_type,
];

$response = Http::post(\'https://httpbin.org/post\', $data);

if ($response->successful()) {
    $result = $response->json();
}',
            'formattedJson' => $formattedJson ?? '<span class="json-comment">// Submit the form to see the echoed POST response data here</span>'
        ])
    </div>

    <script>
        const messageField = document.getElementById('message');
        const charCountElement = document.getElementById('charCount');
        
        if (messageField) {
            messageField.addEventListener('input', function() {
                charCountElement.textContent = `${this.value.length} / 500`;
            });
        }

        document.getElementById('postForm').addEventListener('submit', function() {
            document.getElementById('submitBtn').disabled = true;
            document.getElementById('submitBtn').textContent = 'Sending...';
        });
    </script>
</body>
</html>
