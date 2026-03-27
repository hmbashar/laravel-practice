<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts from JSONPlaceholder</title>
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

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .post-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
        }

        .post-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .post-id {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
            background: var(--bg-tertiary);
            padding: 6px 12px;
            border-radius: 6px;
        }

        .post-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .post-body {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 2rem;
            }

            .posts-grid {
                grid-template-columns: 1fr;
                gap: 16px;
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
            <h1 class="page-title">JSONPlaceholder Posts</h1>
        </div>

        <div class="posts-grid">
            @foreach($posts as $post)
                <div class="post-card">
                    <div class="post-header">
                        <div class="post-id">Post #{{ $post['id'] }}</div>
                        <div style="color: var(--text-muted); font-size: 0.875rem;">by User {{ $post['userId'] }}</div>
                    </div>
                    <div class="post-title">{{ $post['title'] }}</div>
                    <div class="post-body">{{ $post['body'] }}</div>
                </div>
            @endforeach
        </div>

        @include('api-demo.response-display', [
            'description' => 'The API response was processed into a Laravel Collection, taking only the first 10 posts for better display.',
            'codeExample' => '$posts = collect($response->json())->take(10);

// You can now work with the data as a Laravel Collection
$firstPost = $posts->first();
$totalPosts = $posts->count();
$userIds = $posts->pluck(\'userId\')->unique();

// Display the data in your Blade view
@foreach($posts as $post)
    echo $post[\'title\'];
@endforeach',
            'endpoint' => 'https://jsonplaceholder.typicode.com/posts',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get(\'https://jsonplaceholder.typicode.com/posts\');

if ($response->successful()) {
    $posts = collect($response->json())->take(10);
    
    // Process the data as needed
    return view(\'api-demo.posts\', compact(\'posts\'));
} else {
    // Handle error
    return back()->with(\'error\', \'Failed to fetch posts\');
}'
        ])
    </div>
</body>
</html>
