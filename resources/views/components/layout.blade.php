<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo SaaS</title>
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
</head>
<body>

<div class="wrapper">

    <nav class="sidebar">
        <div class="sidebar-brand">
            <h2>Demo <span>SaaS</span></h2>
        </div>

        <ul class="nav-links">
            <li>
                <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>
            @auth
            <li>
                <a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.*') ? 'active' : '' }}">
                    Clients
                </a>
            </li>
            @endauth
        </ul>

        @auth
        <div class="sidebar-user">
            <div class="user-initials">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
            <div class="user-info">
                <p class="user-name">{{ Auth::user()->name }}</p>
                <p class="user-email">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        @endauth
    </nav>

    <div class="content">
        <header class="topbar">
            <h3>Demo SaaS</h3>
            @auth
            <span class="logged-as">Benvenuto {{ Auth::user()->name }}</span>
            @endauth
        </header>

        <main class="main-content">
            {{ $slot }}
        </main>
    </div>

</div>

</body>
</html>