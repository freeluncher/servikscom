<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://kit.fontawesome.com/79638a8e95.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <style>
        /* Custom styles for transitions */
        .transition-transform {
            transition: transform 0.3s ease-in-out;
        }

        .transition-opacity {
            transition: opacity 0.3s ease-in-out;
        }

        .max-h-0 {
            max-height: 0;
            overflow: hidden;
        }

        .max-h-screen {
            max-height: 100vh;
        }
    </style>

</head>

<body class="flex flex-col min-h-screen">
    <div class="flex flex-1">
        <aside id="sidebar"
            class="bg-primary shadow-slate-900/15 shadow-lg shadow-x-2 text-secondary w-64 min-h-screen hidden md:block transition-transform transform">
            <nav class="p-4">
                <ul>
                    <li class="mb-2"><a href="#"
                            class="block p-2 font-medium hover:bg-accent1 hover:text-accent2 hover:rounded-md">Home</a>
                    </li>
                    <li class="mb-2">
                        <div class="mb-2">
                            <i class="fa-solid fa-hospital-user"></i><button
                                class="w-full text-left p-2 hover:bg-accent1 hover:text-accent2 hover:rounded-md"
                                onclick="toggleSubMenu('aboutSubMenu')">Pasien</button>
                        </div>
                        <ul id="aboutSubMenu"
                            class="pl-4 max-h-0 transition-max-height duration-300 ease-in-out overflow-hidden">
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2 hover:rounded-md">Tambah
                                    Pasien</a></li>
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2 hover:rounded-md">Data
                                    Pasien</a></li>
                            <li class="mb-2"><a href="{{ route('medical_records.index') }}"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2 hover:rounded-md">Rekam
                                    Medis</a></li>
                        </ul>
                    </li>
                    <li class="mb-2">
                        <button class="w-full text-left p-2 hover:bg-accent1 hover:text-accent2"
                            onclick="toggleSubMenu('servicesSubMenu')">Services</button>
                        <ul id="servicesSubMenu"
                            class="pl-4 max-h-0 transition-max-height duration-300 ease-in-out overflow-hidden">
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Consulting</a></li>
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Support</a></li>
                        </ul>
                    </li>
                    <li class="mb-2"><a href="#"
                            class="block p-2 hover:bg-accent1 hover:text-accent2">Schedule</a></li>
                </ul>
            </nav>
            <div class="container mx-auto my-auto w-50 p-2">
                <hr class="h-1 bg-secondary border-none rounded-md">
            </div>
            <div class="p-4 flex items-center space-x-2">
                @auth
                    <img src="https://avatar.iran.liara.run/public/boy?username=Ash" alt="Profile Picture"
                        class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm">{{ Auth::user()->name }}</p>
                        <a href="#" class="text-xs text-gray-400 hover:text-white">Settings</a>
                    </div>

                </div>
                <div class="contnainer p-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-secondary no-underline hover:underline">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-secondary no-underline hover:underline pr-4">Login</a>
                <a href="{{ route('register') }}" class="text-secondary no-underline hover:underline">Register</a>
            @endauth
        </aside>

        <main class="flex-1 p-4 bg-gray-200">
            <nav id="mobileNav" class="absolute top-0 left-0 right-0 bg-primary text-secondary p-4 hidden md:hidden">
                <button id="hamburgerBtn" class="bg-blue-500 text-white p-2 rounded">Menu</button>
                <ul id="mobileMenu" class="mt-4 hidden transition-opacity opacity-0">
                    <li class="mb-2"><a href="{{ url('/dashboard') }}"
                            class="block p-2 hover:bg-accent1 hover:text-accent2">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <button class="w-full text-left p-2 hover:bg-accent1 hover:text-accent2"
                            onclick="toggleSubMenu('mobileAboutSubMenu')">Pasien</button>
                        <ul id="mobileAboutSubMenu"
                            class="pl-4 max-h-0 transition-max-height duration-300 ease-in-out overflow-hidden">
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Tambah Pasien</a>
                            </li>
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Data Pasien</a>
                            </li>
                            <li class="mb-2"><a href="{{ route('medical_records.index') }}"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Rekam Medis
                                    Pasien</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-2">
                        <button class="w-full text-left p-2 hover:bg-accent1 hover:text-accent2"
                            onclick="toggleSubMenu('mobileServicesSubMenu')">Services</button>
                        <ul id="mobileServicesSubMenu"
                            class="pl-4 max-h-0 transition-max-height duration-300 ease-in-out overflow-hidden">
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Consulting</a></li>
                            <li class="mb-2"><a href="#"
                                    class="block p-2 hover:bg-accent1 hover:text-accent2">Support</a></li>
                        </ul>
                    </li>
                    <li class="mb-2"><a href="#"
                            class="block p-2 hover:bg-accent1 hover:text-accent2">Contact</a></li>
                </ul>
            </nav>
            <div class="wrapper mt-20 lg:mt-2 md:mt-2">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileNav = document.getElementById('mobileNav');
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('opacity-0');
            } else {
                mobileMenu.classList.remove('opacity-0');
            }
        });

        function toggleSubMenu(id) {
            const submenu = document.getElementById(id);
            submenu.classList.toggle('max-h-0');
            submenu.classList.toggle('max-h-screen');
        }

        // Toggle mobile nav visibility
        window.addEventListener('resize', () => {
            if (window.innerWidth < 768) {
                sidebar.classList.add('hidden', '-translate-x-full');
                mobileNav.classList.remove('hidden');
            } else {
                sidebar.classList.remove('hidden', '-translate-x-full');
                mobileNav.classList.add('hidden');
                mobileMenu.classList.add('hidden', 'opacity-0');
            }
        });

        // Initialize the state based on window size
        if (window.innerWidth < 768) {
            sidebar.classList.add('hidden', '-translate-x-full');
            mobileNav.classList.remove('hidden');
        } else {
            sidebar.classList.remove('hidden', '-translate-x-full');
            mobileNav.classList.add('hidden');
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
