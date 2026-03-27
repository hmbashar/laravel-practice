<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon - {{ ucfirst($pokemonData['name']) }}</title>
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

        .pokemon-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: all 0.2s ease;
            margin-bottom: 40px;
        }

        .pokemon-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .pokemon-name {
            font-size: 2.5rem;
            font-weight: 700;
            text-transform: capitalize;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .pokemon-id {
            font-size: 1.125rem;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .pokemon-image {
            width: 200px;
            height: 200px;
            margin: 0 auto 24px;
            display: block;
        }

        .types {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .type-badge {
            padding: 8px 20px;
            background: var(--primary-color);
            color: white;
            border-radius: 20px;
            text-transform: capitalize;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }

        .stat-item {
            background: var(--bg-tertiary);
            padding: 16px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .pokemon-nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }

        .nav-btn {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .nav-btn:hover {
            background: var(--border-color);
            border-color: var(--text-muted);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 2rem;
            }

            .pokemon-card {
                padding: 24px;
            }

            .stats-grid {
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
            <h1 class="page-title">PokeAPI Explorer</h1>
        </div>

        <div class="pokemon-card">
            <div class="pokemon-name">{{ $pokemonData['name'] }}</div>
            <div class="pokemon-id">National Dex #{{ $pokemonData['id'] }}</div>

            <img src="{{ $pokemonData['sprites']['front_default'] }}" alt="{{ $pokemonData['name'] }}" class="pokemon-image">

            <div class="types">
                @foreach($pokemonData['types'] as $type)
                    <span class="type-badge">{{ $type['type']['name'] }}</span>
                @endforeach
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-label">Height</div>
                    <div class="stat-value">{{ $pokemonData['height'] / 10 }} m</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Weight</div>
                    <div class="stat-value">{{ $pokemonData['weight'] / 10 }} kg</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Base XP</div>
                    <div class="stat-value">{{ $pokemonData['base_experience'] }}</div>
                </div>
            </div>

            <div class="pokemon-nav">
                <a href="{{ route('api-demo.pokemon', 'pikachu') }}" class="nav-btn">Pikachu</a>
                <a href="{{ route('api-demo.pokemon', 'charizard') }}" class="nav-btn">Charizard</a>
                <a href="{{ route('api-demo.pokemon', 'bulbasaur') }}" class="nav-btn">Bulbasaur</a>
                <a href="{{ route('api-demo.pokemon', 'squirtle') }}" class="nav-btn">Squirtle</a>
            </div>
        </div>

        @include('api-demo.response-display', [
            'description' => 'The PokeAPI is a complete RESTful API for Pokémon data. This response includes basic stats, types, and sprite URLs.',
            'codeExample' => '$pokemonData = $response->json();
$name = $pokemonData[\'name\'];
$height = $pokemonData[\'height\'];
$types = collect($pokemonData[\'types\'])->pluck(\'type.name\');',
            'endpoint' => 'https://pokeapi.co/api/v2/pokemon/{name}',
            'laravelCode' => 'use Illuminate\Support\Facades\Http;

$response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemon}");

if ($response->successful()) {
    $pokemonData = $response->json();
    return view(\'api-demo.pokemon\', compact(\'pokemonData\'));
}',
            'formattedJson' => $formattedJson
        ])
    </div>
</body>
</html>
