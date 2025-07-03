<!DOCTYPE html>
<html lang="es"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ asset('public/manifest.json') }}">
    <meta name="theme-color" content="#1e3a8a">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="YosvApps">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <meta name="msapplication-TileColor" content="#1e3a8a">
    <meta name="msapplication-TileImage" content="/icons/icon-192.png">
    <meta name="application-name" content="YosvApps">
    {{ $meta ?? '' }}

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          fontFamily: {
            sans: ['Figtree', 'ui-sans-serif', 'system-ui'],
          },
        },
      }
    </script>
    <style>
      @keyframes fadeIn { from { opacity: 0; transform: translateY(40px);} to { opacity: 1; transform: none; } }
      .animate-fade-in { animation: fadeIn 1s cubic-bezier(.4,0,.2,1) both; }
      @keyframes slideInLeft { from { opacity: 0; transform: translateX(-100%);} to { opacity: 1; transform: none; } }
      .animate-slide-in-left { animation: slideInLeft 0.5s cubic-bezier(.4,0,.2,1) both; }
    </style>
</head>
<body class="min-h-screen font-sans antialiased bg-white text-gray-900 dark:bg-black dark:text-gray-100 transition-colors duration-300">
    <div class="flex flex-col min-h-screen">

        <!-- Navbar -->
        <nav class="backdrop-blur bg-white/80 dark:bg-neutral-900/90 shadow-lg sticky top-0 z-50 transition-all">
            <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-2xl font-extrabold text-blue-700 dark:text-blue-400 tracking-tight drop-shadow hover:text-blue-900 dark:hover:text-blue-200 transition">fg</a>
                </div>
                <div class="hidden md:flex items-center space-x-6 font-semibold">
                    <a href="{{ url('/') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition {{ request()->is('/') ? 'text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                    @auth
                        @if(Auth::user()->role === 'admin_user')
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition">Admin</a>
                        @elseif(Auth::user()->role === 'analista_user')
                            <a href="{{ route('analista.dashboard') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition">Analista</a>
                        @elseif(Auth::user()->role === 'insumos_user')
                            <a href="{{ route('insumos.dashboard') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition">Insumos</a>
                        @elseif(Auth::user()->role === 'personal_user')
                            <a href="{{ route('personal.dashboard') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition">Personal</a>
                        @endif
                    @endauth
                    <div class="flex items-center space-x-2 ml-4">
                        <div x-data="{ open: false }" class="relative">
                            @auth
                                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none group">
                                    <img class="w-9 h-9 rounded-full border-2 border-blue-300 shadow" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar">
                                    <span class="font-semibold text-gray-700 dark:text-gray-100 group-hover:text-blue-700 dark:group-hover:text-blue-300">{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-300 group-hover:text-blue-700 dark:group-hover:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false" x-transition
                                     class="absolute right-0 mt-2 w-48 bg-white dark:bg-neutral-900 rounded-lg shadow-lg py-2 z-50 border border-gray-100 dark:border-neutral-800 animate-fade-in">
                                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-blue-50 dark:hover:bg-neutral-800 text-gray-700 dark:text-gray-100">Ver perfil</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-blue-50 dark:hover:bg-neutral-800 text-red-600 dark:text-red-400">Cerrar sesión</button>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 rounded-md bg-blue-700 text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition">Iniciar sesión</a>
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md border border-blue-700 text-blue-700 dark:text-blue-200 dark:border-blue-400 hover:bg-blue-50 dark:hover:bg-neutral-800 transition">Registrarse</a>
                            @endauth
                        </div>
                        <!-- Toggle Modo Oscuro/Claro -->
                        <button @click="darkMode = !darkMode"
                            class="ml-2 p-2 rounded-full focus:outline-none transition-colors duration-300
                                   hover:bg-blue-100 dark:hover:bg-neutral-800"
                            :aria-label="darkMode ? 'Activar modo claro' : 'Activar modo oscuro'">
                            <template x-if="!darkMode">
                                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2" fill="currentColor"/>
                                    <path stroke="currentColor" stroke-width="2" d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                                </svg>
                            </template>
                            <template x-if="darkMode">
                                <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/>
                                </svg>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenido -->
        <main class="flex-1 overflow-y-auto sm:p-4 md:p-6 bg-gray-50 dark:bg-black">
            <div class="max-w-full md:max-w-7xl mx-auto">
                {{ $slot ?? '' }}
            </div>
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
