<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bashar | Home')</title>
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    @vite('resources/css/app.css')

    @stack('styles')
</head>
<body>
<header>
    <nav style="display:flex; align-items:center; justify-content:space-between; padding:1rem 2rem;">
        <div id="site-title" style="font-weight:bold; font-size:1.2rem;">Bashar</div>
        <ul style="display:flex; gap:1rem; list-style:none; margin:0; padding:0;">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a></li>
        </ul>
        <form action="" method="get" style="display:flex; gap:0.5rem;">
            <input type="search" name="q" placeholder="Search..." style="padding:0.4rem;">
            <button type="submit" style="padding:0.4rem 0.8rem;">Search</button>
        </form>
    </nav>
</header>

    @yield('content')

    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
