<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random User Generator</title>
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

        .user-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .user-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 24px;
            border: 4px solid var(--bg-tertiary);
            box-shadow: var(--shadow-md);
        }

        .user-name {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .user-email {
            font-size: 1.125rem;
            color: var(--primary-color);
            margin-bottom: 16px;
            font-weight: 500;
        }

        .user-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .info-item {
            padding: 16px;
            background: var(--bg-tertiary);
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .info-label {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1rem;
            color: var(--text-primary);
            font-weight: 500;
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

            .user-card {
                padding: 24px;
            }

            .user-info {
                grid-template-columns: 1fr;
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
            <h1 class="page-title">Random User Generator</h1>
        </div>

        <div class="user-card">
            <img src="{{ $user['picture']['large'] }}" alt="User" class="user-avatar">
            <div class="user-name">{{ $user['name']['first'] }} {{ $user['name']['last'] }}</div>
            <div class="user-email">{{ $user['email'] }}</div>

            <div class="user-info">
                <div class="info-item">
                    <div class="info-label">Location</div>
                    <div class="info-value">{{ $user['location']['city'] }}, {{ $user['location']['country'] }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Phone</div>
                    <div class="info-value">{{ $user['phone'] }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Age</div>
                    <div class="info-value">{{ $user['dob']['age'] }} years</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Gender</div>
                    <div class="info-value">{{ ucfirst($user['gender']) }}</div>
                </div>
            </div>

            <a href="{{ route('api-demo.random-user') }}" class="refresh-button">
                🔄 Get Another User
            </a>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The RandomUser API provides comprehensive user profile data including demographics, location, contact information, and profile pictures.',
            'codeExample' => '$user = $response->json()[\'results\'][0];

// Access user data
$name = $user[\'name\'][\'first\'] . \' \' . $user[\'name\'][\'last\'];
$email = $user[\'email\'];
$location = $user[\'location\'][\'city\'];
$phone = $user[\'phone\'];
$picture = $user[\'picture\'][\'large\'];

// Display in Blade view
<img src="{{ $picture }}" alt="{{ $name }}">',
            'endpoint' => 'https://randomuser.me/api/',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://randomuser.me/api/\');

if ($response->successful()) {
    $user = $response->json()[\'results\'][0];

    // Process the user data
    return view(\'api-demo.random-user\', compact(\'user\'));
} else {
    // Handle error
    return back()->with(\'error\', \'Failed to fetch user data\');
}'
        ])
    </div>
</body>
</html>
