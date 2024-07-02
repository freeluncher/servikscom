<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div class="flex flex-col">
        <nav class="bg-primary p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="{{ url('/dashboard') }}" class="text-lg font-semibold text-secondary no-underline">
                        Dashboard
                    </a>
                </div>
                <div class="flex items-center">
                    @auth
                        <span class="text-secondary pr-4">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-secondary no-underline hover:underline">
                                Logout
                            </button>
                        </form>
                        <a href="{{ route('medical_records.index') }}"
                            class="text-secondary no-underline hover:underline pr-4">Rekam Medis</a>
                    @else
                        <a href="{{ route('login') }}" class="text-secondary no-underline hover:underline pr-4">Login</a>
                        <a href="{{ route('register') }}" class="text-secondary no-underline hover:underline">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-grow container mx-auto p-6 bg-accent2 rounded-lg shadow-lg">
            @yield('content')
        </main>

        <footer class="bg-primary text-secondary text-center p-4">
            &copy; {{ date('Y') }} Your Company
        </footer>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
