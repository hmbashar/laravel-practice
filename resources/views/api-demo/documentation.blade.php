<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - Laravel API Demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8f9fa;
            color: #2d3748;
            line-height: 1.7;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            text-decoration: none;
        }

        .logo span {
            color: #4299e1;
        }

        .nav-links {
            display: flex;
            gap: 24px;
        }

        .nav-links a {
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .nav-links a:hover {
            color: #4299e1;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 40px;
            margin-top: 40px;
        }

        .sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .sidebar-nav {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
        }

        .sidebar-title {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #a0aec0;
            margin-bottom: 12px;
        }

        .sidebar-links {
            list-style: none;
        }

        .sidebar-links li {
            margin-bottom: 8px;
        }

        .sidebar-links a {
            color: #4a5568;
            text-decoration: none;
            font-size: 0.875rem;
            display: block;
            padding: 6px 0;
            border-left: 2px solid transparent;
            padding-left: 12px;
        }

        .sidebar-links a:hover,
        .sidebar-links a.active {
            color: #4299e1;
            border-left-color: #4299e1;
        }

        .main-content {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 40px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 16px;
        }

        .lead {
            font-size: 1.125rem;
            color: #4a5568;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a202c;
            margin-top: 48px;
            margin-bottom: 16px;
            padding-top: 24px;
            border-top: 2px solid #e9ecef;
        }

        h2:first-of-type {
            margin-top: 0;
            border-top: none;
        }

        h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin-top: 24px;
            margin-bottom: 12px;
        }

        p {
            margin-bottom: 16px;
        }

        pre.code-block {
            background: #2d3748;
            color: #e2e8f0;
            border-radius: 6px;
            padding: 20px;
            margin: 20px 0;
            overflow-x: auto;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
            line-height: 1.6;
            white-space: pre;
            tab-size: 4;
        }

        .code-block .comment {
            color: #68d391;
        }

        .code-block .keyword {
            color: #63b3ed;
        }

        .code-block .string {
            color: #fbd38d;
        }

        .code-block .function {
            color: #f687b3;
        }

        .inline-code {
            background: #edf2f7;
            color: #e53e3e;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
        }

        .info-box {
            background: #ebf8ff;
            border-left: 4px solid #4299e1;
            padding: 16px 20px;
            margin: 24px 0;
            border-radius: 4px;
        }

        .info-box-title {
            font-weight: 600;
            color: #2b6cb0;
            margin-bottom: 8px;
        }

        .info-box p {
            margin: 0;
            color: #2c5282;
            font-size: 0.9rem;
        }

        .warning-box {
            background: #fffaf0;
            border-left: 4px solid #ed8936;
            padding: 16px 20px;
            margin: 24px 0;
            border-radius: 4px;
        }

        .warning-box-title {
            font-weight: 600;
            color: #c05621;
            margin-bottom: 8px;
        }

        .warning-box p {
            margin: 0;
            color: #744210;
            font-size: 0.9rem;
        }

        ul, ol {
            margin-left: 24px;
            margin-bottom: 16px;
        }

        li {
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            background: #f7fafc;
            font-weight: 600;
            color: #2d3748;
        }

        td {
            color: #4a5568;
        }

        .back-to-top {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
            margin-top: 40px;
        }

        .back-to-top:hover {
            text-decoration: underline;
        }

        @media (max-width: 1024px) {
            .content-wrapper {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
                order: -1;
            }

            .sidebar-nav {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('welcome') }}" class="logo">Laravel <span>API</span> Demo</a>
                <nav class="nav-links">
                    <a href="{{ route('welcome') }}">Home</a>
                    <a href="{{ route('api-demo.documentation') }}">Documentation</a>
                    <a href="{{ route('api-demo.index') }}">Examples</a>
                </nav>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-wrapper">
            <aside class="sidebar">
                <nav class="sidebar-nav">
                    <div class="sidebar-title">On This Page</div>
                    <ul class="sidebar-links">
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#basic-get">Basic GET Requests</a></li>
                        <li><a href="#post-requests">POST Requests</a></li>
                        <li><a href="#query-params">Query Parameters</a></li>
                        <li><a href="#headers">Custom Headers</a></li>
                        <li><a href="#authentication">Authentication</a></li>
                        <li><a href="#bearer-token">Bearer Token Auth</a></li>
                        <li><a href="#api-key">API Key Auth</a></li>
                        <li><a href="#parsing">Parsing Responses</a></li>
                        <li><a href="#error-handling">Error Handling</a></li>
                        <li><a href="#best-practices">Best Practices</a></li>
                    </ul>
                </nav>
            </aside>

            <main class="main-content">
                <h1>Complete Guide to External API Calls in Laravel</h1>
                <p class="lead">
                    Learn how to integrate external APIs into your Laravel applications using Laravel's powerful HTTP client. This guide covers everything from basic requests to advanced authentication and error handling.
                </p>

                <h2 id="introduction">Introduction</h2>
                <p>
                    Laravel provides an expressive, minimal API around the Guzzle HTTP client, allowing you to quickly make outgoing HTTP requests to communicate with other web applications. Laravel's wrapper around Guzzle is focused on its most common use cases and provides a wonderful developer experience.
                </p>

                <div class="info-box">
                    <div class="info-box-title">💡 Prerequisites</div>
                    <p>Before starting, ensure you have Laravel installed. The HTTP client is available in Laravel 7.x and later versions. No additional package installation is required as it's built into Laravel.</p>
                </div>

                <h2 id="basic-get">Basic GET Requests</h2>
                <p>
                    The simplest way to make a GET request is using the <span class="inline-code">Http::get()</span> method. This is perfect for fetching data from external APIs.
                </p>

                <pre class="code-block"><span class="keyword">use</span> Illuminate\Support\Facades\Http;

<span class="comment">// Simple GET request</span>
<span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>);

<span class="comment">// The get() method returns an instance of Illuminate\Http\Client\Response</span>
<span class="comment">// You can access the data using various methods</span></pre>

                <h3>Real Example from Our Demos</h3>
                <pre class="code-block"><span class="keyword">public function</span> <span class="function">randomUser</span>()
{
    <span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://randomuser.me/api/'</span>);
    
    <span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">successful</span>()) {
        <span class="keyword">$user</span> = <span class="keyword">$response</span>-><span class="function">json</span>()[<span class="string">'results'</span>][0];
        <span class="keyword">return</span> <span class="function">view</span>(<span class="string">'user'</span>, <span class="function">compact</span>(<span class="string">'user'</span>));
    }
    
    <span class="keyword">return</span> <span class="function">back</span>()-><span class="function">with</span>(<span class="string">'error'</span>, <span class="string">'Failed to fetch user'</span>);
}</pre>

                <h2 id="post-requests">POST Requests</h2>
                <p>
                    POST requests are used to send data to an API. You can send data as an array, which will be automatically formatted as JSON.
                </p>

                <pre class="code-block"><span class="comment">// POST request with data</span>
<span class="keyword">$response</span> = Http::<span class="function">post</span>(<span class="string">'https://api.example.com/users'</span>, [
    <span class="string">'name'</span> => <span class="string">'John Doe'</span>,
    <span class="string">'email'</span> => <span class="string">'john@example.com'</span>,
    <span class="string">'role'</span> => <span class="string">'admin'</span>,
]);

<span class="comment">// Alternative: using asForm() for form-encoded data</span>
<span class="keyword">$response</span> = Http::<span class="function">asForm</span>()-><span class="function">post</span>(<span class="string">'https://api.example.com/login'</span>, [
    <span class="string">'email'</span> => <span class="string">'user@example.com'</span>,
    <span class="string">'password'</span> => <span class="string">'secret'</span>,
]);</pre>

                <h3>Other HTTP Methods</h3>
                <pre class="code-block"><span class="comment">// PUT request (update entire resource)</span>
<span class="keyword">$response</span> = Http::<span class="function">put</span>(<span class="string">'https://api.example.com/users/1'</span>, [<span class="string">'name'</span> => <span class="string">'Jane'</span>]);

<span class="comment">// PATCH request (partial update)</span>
<span class="keyword">$response</span> = Http::<span class="function">patch</span>(<span class="string">'https://api.example.com/users/1'</span>, [<span class="string">'email'</span> => <span class="string">'jane@example.com'</span>]);

<span class="comment">// DELETE request</span>
<span class="keyword">$response</span> = Http::<span class="function">delete</span>(<span class="string">'https://api.example.com/users/1'</span>);</pre>

                <h2 id="query-params">Query Parameters</h2>
                <p>
                    When you need to add query parameters to a URL, you can pass them as the second argument or use the <span class="inline-code">withQueryParameters()</span> method.
                </p>

                <pre class="code-block"><span class="comment">// Method 1: Pass as second argument</span>
<span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://api.example.com/search'</span>, [
    <span class="string">'q'</span> => <span class="string">'laravel'</span>,
    <span class="string">'page'</span> => 1,
    <span class="string">'limit'</span> => 10,
]);
<span class="comment">// Results in: https://api.example.com/search?q=laravel&page=1&limit=10</span>

<span class="comment">// Method 2: Using withQueryParameters()</span>
<span class="keyword">$response</span> = Http::<span class="function">withQueryParameters</span>([
    <span class="string">'q'</span> => <span class="string">'laravel'</span>,
    <span class="string">'page'</span> => 1,
])-><span class="function">get</span>(<span class="string">'https://api.example.com/search'</span>);</pre>

                <h3>Real Example - Weather API</h3>
                <pre class="code-block"><span class="keyword">$city</span> = <span class="string">'London'</span>;
<span class="keyword">$geocoding</span> = Http::<span class="function">get</span>(<span class="string">"https://geocoding-api.open-meteo.com/v1/search"</span>, [
    <span class="string">'name'</span> => <span class="keyword">$city</span>,
    <span class="string">'count'</span> => 1,
]);</pre>

                <h2 id="headers">Custom Headers</h2>
                <p>
                    Many APIs require custom headers for content type, user agent, or other metadata. Use <span class="inline-code">withHeaders()</span> to add them.
                </p>

                <pre class="code-block"><span class="comment">// Add custom headers</span>
<span class="keyword">$response</span> = Http::<span class="function">withHeaders</span>([
    <span class="string">'Accept'</span> => <span class="string">'application/json'</span>,
    <span class="string">'User-Agent'</span> => <span class="string">'MyLaravelApp/1.0'</span>,
    <span class="string">'X-Custom-Header'</span> => <span class="string">'Custom-Value'</span>,
])-><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="comment">// Add a single header</span>
<span class="keyword">$response</span> = Http::<span class="function">withHeader</span>(<span class="string">'Accept'</span>, <span class="string">'application/json'</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="comment">// Set content type</span>
<span class="keyword">$response</span> = Http::<span class="function">contentType</span>(<span class="string">'application/json'</span>)
    -><span class="function">post</span>(<span class="string">'https://api.example.com/data'</span>, <span class="keyword">$data</span>);</pre>

                <h2 id="authentication">Authentication</h2>
                <p>
                    External APIs often require authentication. Laravel's HTTP client supports various authentication methods including Bearer tokens, basic authentication, and API keys.
                </p>

                <h2 id="bearer-token">Bearer Token Authentication</h2>
                <p>
                    Bearer tokens are the most common authentication method for modern REST APIs. Use the <span class="inline-code">withToken()</span> method.
                </p>

                <pre class="code-block"><span class="comment">// Bearer token authentication</span>
<span class="keyword">$token</span> = <span class="string">'your-api-token-here'</span>;

<span class="keyword">$response</span> = Http::<span class="function">withToken</span>(<span class="keyword">$token</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/user/profile'</span>);

<span class="comment">// This adds: Authorization: Bearer your-api-token-here</span>

<span class="comment">// POST with bearer token</span>
<span class="keyword">$response</span> = Http::<span class="function">withToken</span>(<span class="keyword">$token</span>)
    -><span class="function">post</span>(<span class="string">'https://api.example.com/posts'</span>, [
        <span class="string">'title'</span> => <span class="string">'My Post'</span>,
        <span class="string">'body'</span> => <span class="string">'Post content...'</span>,
    ]);</pre>

                <div class="warning-box">
                    <div class="warning-box-title">⚠️ Security Best Practice</div>
                    <p>Never hardcode API tokens in your code! Store them in your <span class="inline-code">.env</span> file and access using <span class="inline-code">env('API_TOKEN')</span> or <span class="inline-code">config('services.api.token')</span>.</p>
                </div>

                <h3>Storing Tokens Securely</h3>
                <pre class="code-block"><span class="comment">// In .env file</span>
API_TOKEN=your-secret-token-here

<span class="comment">// In config/services.php</span>
<span class="string">'github'</span> => [
    <span class="string">'token'</span> => <span class="function">env</span>(<span class="string">'GITHUB_TOKEN'</span>),
],

<span class="comment">// In your controller</span>
<span class="keyword">$response</span> = Http::<span class="function">withToken</span>(<span class="function">config</span>(<span class="string">'services.github.token'</span>))
    -><span class="function">get</span>(<span class="string">'https://api.github.com/user'</span>);</pre>

                <h2 id="api-key">API Key Authentication</h2>
                <p>
                    Some APIs use API keys in headers or query parameters. Here are common patterns:
                </p>

                <pre class="code-block"><span class="comment">// Method 1: API key in header</span>
<span class="keyword">$response</span> = Http::<span class="function">withHeaders</span>([
    <span class="string">'X-API-Key'</span> => <span class="function">config</span>(<span class="string">'services.api.key'</span>),
])-><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="comment">// Method 2: API key as query parameter</span>
<span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>, [
    <span class="string">'api_key'</span> => <span class="function">config</span>(<span class="string">'services.api.key'</span>),
    <span class="string">'query'</span> => <span class="string">'value'</span>,
]);

<span class="comment">// Method 3: Basic authentication</span>
<span class="keyword">$response</span> = Http::<span class="function">withBasicAuth</span>(<span class="string">'username'</span>, <span class="string">'password'</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="comment">// Method 4: Digest authentication</span>
<span class="keyword">$response</span> = Http::<span class="function">withDigestAuth</span>(<span class="string">'username'</span>, <span class="string">'password'</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);</pre>

                <h2 id="parsing">Parsing API Responses</h2>
                <p>
                    Laravel's HTTP client provides several methods to access response data in different formats.
                </p>

                <pre class="code-block"><span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://api.example.com/users/1'</span>);

<span class="comment">// Get JSON data as array</span>
<span class="keyword">$data</span> = <span class="keyword">$response</span>-><span class="function">json</span>();
<span class="comment">// Returns: ['id' => 1, 'name' => 'John', 'email' => 'john@example.com']</span>

<span class="comment">// Get specific key from JSON</span>
<span class="keyword">$name</span> = <span class="keyword">$response</span>-><span class="function">json</span>(<span class="string">'name'</span>);
<span class="comment">// Returns: 'John'</span>

<span class="comment">// Access nested data</span>
<span class="keyword">$city</span> = <span class="keyword">$response</span>-><span class="function">json</span>(<span class="string">'address.city'</span>);
<span class="comment">// Returns nested city value</span>

<span class="comment">// Get raw response body as string</span>
<span class="keyword">$body</span> = <span class="keyword">$response</span>-><span class="function">body</span>();

<span class="comment">// Get as object</span>
<span class="keyword">$object</span> = <span class="keyword">$response</span>-><span class="function">object</span>();

<span class="comment">// Get as collection (Laravel collections)</span>
<span class="keyword">$collection</span> = <span class="keyword">$response</span>-><span class="function">collect</span>();</pre>

                <h3>Working with Collections</h3>
                <pre class="code-block"><span class="comment">// Fetch multiple posts and work with collections</span>
<span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://jsonplaceholder.typicode.com/posts'</span>);
<span class="keyword">$posts</span> = <span class="keyword">$response</span>-><span class="function">collect</span>();

<span class="comment">// Take first 10 posts</span>
<span class="keyword">$firstTen</span> = <span class="keyword">$posts</span>-><span class="function">take</span>(10);

<span class="comment">// Filter posts</span>
<span class="keyword">$filtered</span> = <span class="keyword">$posts</span>-><span class="function">where</span>(<span class="string">'userId'</span>, 1);

<span class="comment">// Map over posts</span>
<span class="keyword">$titles</span> = <span class="keyword">$posts</span>-><span class="function">pluck</span>(<span class="string">'title'</span>);

<span class="comment">// In controller</span>
<span class="keyword">return</span> <span class="function">view</span>(<span class="string">'posts'</span>, [<span class="string">'posts'</span> => <span class="keyword">$firstTen</span>]);</pre>

                <h3>Response Information</h3>
                <pre class="code-block"><span class="comment">// Get HTTP status code</span>
<span class="keyword">$status</span> = <span class="keyword">$response</span>-><span class="function">status</span>(); <span class="comment">// 200, 404, 500, etc.</span>

<span class="comment">// Check if successful (200-299)</span>
<span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">successful</span>()) {
    <span class="comment">// Request was successful</span>
}

<span class="comment">// Check if client error (400-499)</span>
<span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">clientError</span>()) {
    <span class="comment">// Bad request, unauthorized, not found, etc.</span>
}

<span class="comment">// Check if server error (500-599)</span>
<span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">serverError</span>()) {
    <span class="comment">// Server failed</span>
}

<span class="comment">// Check if request failed</span>
<span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">failed</span>()) {
    <span class="comment">// Either client or server error</span>
}

<span class="comment">// Get response headers</span>
<span class="keyword">$headers</span> = <span class="keyword">$response</span>-><span class="function">headers</span>();

<span class="comment">// Get specific header</span>
<span class="keyword">$contentType</span> = <span class="keyword">$response</span>-><span class="function">header</span>(<span class="string">'Content-Type'</span>);</pre>

                <h2 id="error-handling">Error Handling</h2>
                <p>
                    Proper error handling is crucial for production applications. Here are best practices for handling API errors.
                </p>

                <pre class="code-block"><span class="keyword">public function</span> <span class="function">fetchUserData</span>(<span class="keyword">$id</span>)
{
    <span class="keyword">try</span> {
        <span class="keyword">$response</span> = Http::<span class="function">timeout</span>(30)
            -><span class="function">retry</span>(3, 100)
            -><span class="function">get</span>(<span class="string">"https://api.example.com/users/{$id}"</span>);
        
        <span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">successful</span>()) {
            <span class="keyword">return</span> <span class="keyword">$response</span>-><span class="function">json</span>();
        }
        
        <span class="comment">// Handle different error codes</span>
        <span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">status</span>() === 404) {
            <span class="keyword">throw new</span> <span class="function">Exception</span>(<span class="string">'User not found'</span>);
        }
        
        <span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">status</span>() === 401) {
            <span class="keyword">throw new</span> <span class="function">Exception</span>(<span class="string">'Unauthorized access'</span>);
        }
        
        <span class="keyword">throw new</span> <span class="function">Exception</span>(<span class="string">'API request failed'</span>);
        
    } <span class="keyword">catch</span> (\Exception <span class="keyword">$e</span>) {
        <span class="comment">// Log the error</span>
        <span class="function">Log</span>::<span class="function">error</span>(<span class="string">'API Error: '</span> . <span class="keyword">$e</span>-><span class="function">getMessage</span>());
        
        <span class="comment">// Return user-friendly error</span>
        <span class="keyword">return</span> <span class="function">back</span>()-><span class="function">with</span>(<span class="string">'error'</span>, <span class="string">'Unable to fetch user data. Please try again.'</span>);
    }
}</pre>

                <h3>Timeout and Retry</h3>
                <pre class="code-block"><span class="comment">// Set timeout (in seconds)</span>
<span class="keyword">$response</span> = Http::<span class="function">timeout</span>(30)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="comment">// Retry failed requests</span>
<span class="comment">// retry(times, sleep-milliseconds)</span>
<span class="keyword">$response</span> = Http::<span class="function">retry</span>(3, 100)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="comment">// Combine timeout and retry</span>
<span class="keyword">$response</span> = Http::<span class="function">timeout</span>(30)
    -><span class="function">retry</span>(3, 100)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);</pre>

                <h2 id="best-practices">Best Practices</h2>

                <h3>1. Use Configuration Files</h3>
                <pre class="code-block"><span class="comment">// config/services.php</span>
<span class="string">'api'</span> => [
    <span class="string">'base_url'</span> => <span class="function">env</span>(<span class="string">'API_BASE_URL'</span>),
    <span class="string">'token'</span> => <span class="function">env</span>(<span class="string">'API_TOKEN'</span>),
    <span class="string">'timeout'</span> => <span class="function">env</span>(<span class="string">'API_TIMEOUT'</span>, 30),
],

<span class="comment">// In your code</span>
<span class="keyword">$response</span> = Http::<span class="function">baseUrl</span>(<span class="function">config</span>(<span class="string">'services.api.base_url'</span>))
    -><span class="function">withToken</span>(<span class="function">config</span>(<span class="string">'services.api.token'</span>))
    -><span class="function">timeout</span>(<span class="function">config</span>(<span class="string">'services.api.timeout'</span>))
    -><span class="function">get</span>(<span class="string">'/users'</span>);</pre>

                <h3>2. Create Service Classes</h3>
                <pre class="code-block"><span class="comment">// app/Services/ApiService.php</span>
<span class="keyword">class</span> ApiService
{
    <span class="keyword">protected</span> <span class="keyword">$baseUrl</span>;
    <span class="keyword">protected</span> <span class="keyword">$token</span>;

    <span class="keyword">public function</span> <span class="function">__construct</span>()
    {
        <span class="keyword">$this</span>->baseUrl = <span class="function">config</span>(<span class="string">'services.api.base_url'</span>);
        <span class="keyword">$this</span>->token = <span class="function">config</span>(<span class="string">'services.api.token'</span>);
    }

    <span class="keyword">public function</span> <span class="function">getUsers</span>()
    {
        <span class="keyword">return</span> Http::<span class="function">withToken</span>(<span class="keyword">$this</span>->token)
            -><span class="function">get</span>(<span class="string">"{$this->baseUrl}/users"</span>);
    }

    <span class="keyword">public function</span> <span class="function">createUser</span>(<span class="keyword">$data</span>)
    {
        <span class="keyword">return</span> Http::<span class="function">withToken</span>(<span class="keyword">$this</span>->token)
            -><span class="function">post</span>(<span class="string">"{$this->baseUrl}/users"</span>, <span class="keyword">$data</span>);
    }
}</pre>

                <h3>3. Use Caching for Repeated Requests</h3>
                <pre class="code-block"><span class="comment">// Cache API responses to reduce API calls</span>
<span class="keyword">$users</span> = <span class="function">Cache</span>::<span class="function">remember</span>(<span class="string">'api.users'</span>, 3600, <span class="keyword">function</span> () {
    <span class="keyword">return</span> Http::<span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>)-><span class="function">json</span>();
});</pre>

                <h3>4. Always Validate Responses</h3>
                <pre class="code-block"><span class="keyword">$response</span> = Http::<span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>);

<span class="keyword">if</span> (!<span class="keyword">$response</span>-><span class="function">successful</span>()) {
    <span class="function">Log</span>::<span class="function">error</span>(<span class="string">'API failed'</span>, [
        <span class="string">'status'</span> => <span class="keyword">$response</span>-><span class="function">status</span>(),
        <span class="string">'body'</span> => <span class="keyword">$response</span>-><span class="function">body</span>(),
    ]);
    <span class="keyword">return</span> <span class="function">back</span>()-><span class="function">with</span>(<span class="string">'error'</span>, <span class="string">'Failed to fetch users'</span>);
}

<span class="comment">// Validate data structure</span>
<span class="keyword">$data</span> = <span class="keyword">$response</span>-><span class="function">json</span>();
<span class="function">validator</span>(<span class="keyword">$data</span>, [
    <span class="string">'*.id'</span> => <span class="string">'required|integer'</span>,
    <span class="string">'*.name'</span> => <span class="string">'required|string'</span>,
])-><span class="function">validate</span>();</pre>

                <div class="info-box">
                    <div class="info-box-title">📚 Additional Resources</div>
                    <p>
                        <strong>Laravel HTTP Client Documentation:</strong> <a href="https://laravel.com/docs/http-client" target="_blank" style="color: #2b6cb0;">https://laravel.com/docs/http-client</a><br>
                        <strong>Guzzle Documentation:</strong> <a href="https://docs.guzzlephp.org" target="_blank" style="color: #2b6cb0;">https://docs.guzzlephp.org</a>
                    </p>
                </div>

                <h3>Complete Example - Real World API Integration</h3>
                <pre class="code-block"><span class="keyword">use</span> Illuminate\Support\Facades\Http;
<span class="keyword">use</span> Illuminate\Support\Facades\Cache;
<span class="keyword">use</span> Illuminate\Support\Facades\Log;

<span class="keyword">class</span> WeatherService
{
    <span class="keyword">protected</span> <span class="keyword">$apiKey</span>;
    <span class="keyword">protected</span> <span class="keyword">$baseUrl</span>;

    <span class="keyword">public function</span> <span class="function">__construct</span>()
    {
        <span class="keyword">$this</span>->apiKey = <span class="function">config</span>(<span class="string">'services.weather.key'</span>);
        <span class="keyword">$this</span>->baseUrl = <span class="string">'https://api.weatherapi.com/v1'</span>;
    }

    <span class="keyword">public function</span> <span class="function">getCurrentWeather</span>(<span class="keyword">$city</span>)
    {
        <span class="comment">// Check cache first</span>
        <span class="keyword">$cacheKey</span> = <span class="string">"weather.{$city}"</span>;
        
        <span class="keyword">return</span> <span class="function">Cache</span>::<span class="function">remember</span>(<span class="keyword">$cacheKey</span>, 1800, <span class="keyword">function</span> () <span class="keyword">use</span> (<span class="keyword">$city</span>) {
            <span class="keyword">try</span> {
                <span class="keyword">$response</span> = Http::<span class="function">timeout</span>(10)
                    -><span class="function">retry</span>(2, 100)
                    -><span class="function">get</span>(<span class="string">"{$this->baseUrl}/current.json"</span>, [
                        <span class="string">'key'</span> => <span class="keyword">$this</span>->apiKey,
                        <span class="string">'q'</span> => <span class="keyword">$city</span>,
                    ]);

                <span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">successful</span>()) {
                    <span class="keyword">return</span> <span class="keyword">$response</span>-><span class="function">json</span>();
                }

                <span class="function">Log</span>::<span class="function">error</span>(<span class="string">'Weather API failed'</span>, [
                    <span class="string">'status'</span> => <span class="keyword">$response</span>-><span class="function">status</span>(),
                    <span class="string">'city'</span> => <span class="keyword">$city</span>,
                ]);

                <span class="keyword">return null</span>;

            } <span class="keyword">catch</span> (\Exception <span class="keyword">$e</span>) {
                <span class="function">Log</span>::<span class="function">error</span>(<span class="string">'Weather API exception'</span>, [
                    <span class="string">'message'</span> => <span class="keyword">$e</span>-><span class="function">getMessage</span>(),
                    <span class="string">'city'</span> => <span class="keyword">$city</span>,
                ]);

                <span class="keyword">return null</span>;
            }
        });
    }
}</pre>

                <div class="info-box" style="margin-top: 40px;">
                    <div class="info-box-title">✅ Quick Reference</div>
                    <p>
                        <strong>GET Request:</strong> <code>Http::get($url)</code><br>
                        <strong>POST Request:</strong> <code>Http::post($url, $data)</code><br>
                        <strong>Bearer Token:</strong> <code>Http::withToken($token)->get($url)</code><br>
                        <strong>Headers:</strong> <code>Http::withHeaders(['Key' => 'Value'])->get($url)</code><br>
                        <strong>Timeout:</strong> <code>Http::timeout(30)->get($url)</code><br>
                        <strong>Parse JSON:</strong> <code>$response->json()</code><br>
                        <strong>Check Success:</strong> <code>$response->successful()</code>
                    </p>
                </div>

                <a href="#" class="back-to-top">↑ Back to Top</a>
            </main>
        </div>
    </div>

    <script>
        // Smooth scrolling for sidebar links
        document.querySelectorAll('.sidebar-links a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });

        // Highlight active section in sidebar
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('h2[id]');
            const scrollPos = window.scrollY + 100;

            sections.forEach(section => {
                const top = section.offsetTop;
                const bottom = top + section.offsetHeight;
                const id = section.getAttribute('id');
                const link = document.querySelector(`.sidebar-links a[href="#${id}"]`);

                if (scrollPos >= top && scrollPos < bottom) {
                    document.querySelectorAll('.sidebar-links a').forEach(a => a.classList.remove('active'));
                    if (link) link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>
