<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XKCD Comic - {{ $comic['num'] }}</title>
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

        .comic-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 16px;
        }

        .comic-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .comic-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
            color: #718096;
            font-size: 0.9rem;
        }

        .comic-alt {
            font-size: 0.95rem;
            color: #4a5568;
            line-height: 1.6;
        }

        .comic-date {
            font-size: 0.85rem;
            color: #a0aec0;
        }

        .actions {
            margin-top: 24px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            margin: 5px;
            padding: 8px 16px;
            background: #4299e1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #3182ce;
        }

        .code-section {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
        }

        .code-section h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2a202c;
            margin-bottom: 12px;
        }

        pre {
            background: #2d3748;
            border-radius: 6px;
            padding: 16px;
            margin: 20px 0;
            overflow-x: auto;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
            line-height: 1.6;
            white-space: pre;
        }

code>
<span class="comment">// Get comic by number</span>
<span class="keyword">$comicNumber</span> = <span class="function">get</span>(<span class="string">"https://xkcd.com/{$comicNumber}/info.0.json"</span>);

<span class="keyword">if</span> (<span class="keyword">$response</span>-><span class="function">successful</span>()
    <span class="keyword">$comic</span> = <span class="keyword">$response</span>-><span class="function">json</span>();
    <span class="keyword">return</span> <span class="function">view</span>(<span class="string">'api-demo.xkcd'</span>, <span class="keyword">compact</span>(<span class="string">'comic'</span>));
<span class="keyword">return</span> back()->with(<span class="string">'error'</span>, <span class="string">'Comic not found'</span>);
}
</pre>
    </div>
</body>
</html>
