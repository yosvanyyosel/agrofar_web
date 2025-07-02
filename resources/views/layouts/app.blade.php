<!DOCTYPE html>
<html lang="es"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Manifest para PWA -->
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-blue-700 dark:text-blue-400 tracking-tight drop-shadow hover:text-blue-900 dark:hover:text-blue-200 transition">YosvApps</a>
                </div>
                <!-- Menú Desktop -->
                <div class="hidden md:flex items-center space-x-6 font-semibold">
                    <a href="{{ route('home') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition {{ request()->routeIs('home') ? 'text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                    <a href="{{ route('tienda.index') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition {{ request()->routeIs('tienda.index') ? 'text-blue-700 dark:text-blue-400' : '' }}">Tienda</a>
                    <a href="{{ route('blog.index') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition {{ request()->routeIs('blog.index') ? 'text-blue-700 dark:text-blue-400' : '' }}">Blog</a>
                    <a href="{{ route('contactos') }}" class="hover:text-blue-700 dark:hover:text-blue-400 transition {{ request()->routeIs('contactos') ? 'text-blue-700 dark:text-blue-400' : '' }}">Contactos</a>
                    <div class="flex items-center space-x-2 ml-4">
                        <!-- Dropdown Usuario -->
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
                <!-- Menú Mobile -->
                <div x-data="{ open: false }" class="md:hidden">
                    <button @click="open = true" aria-label="Abrir menú" class="p-2 focus:outline-none transition hover:scale-110">
                        <svg class="w-7 h-7 text-blue-700 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <!-- Overlay -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 z-40 bg-black/40 backdrop-blur-md"
                        @click="open = false"
                        aria-hidden="true">
                    </div>
                    <!-- Drawer -->
                    <aside 
                        x-show="open"
                        x-transition:enter="animate-slide-in-left"
                        x-transition:leave="animate-slide-in-left"
                        class="fixed top-0 left-0 z-50 h-screen w-72 bg-white dark:bg-neutral-900 shadow-2xl flex flex-col"
                        @keydown.escape.window="open = false"
                        @click.away="open = false"
                        aria-label="Menú móvil">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 flex items-center justify-between">
                            <span class="text-2xl font-bold text-blue-700 dark:text-blue-400">YosvApps</span>
                            <button @click="open = false" class="text-gray-500 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-200 focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <!-- Toggle Modo Oscuro/Claro -->
                        <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-200 dark:border-neutral-800 bg-white dark:bg-neutral-900">
                            <button @click="darkMode = !darkMode"
                                class="relative inline-flex items-center h-8 w-14 rounded-full transition-colors duration-300 focus:outline-none bg-zinc-200 dark:bg-neutral-800 border border-transparent">
                                <span class="sr-only">Cambiar tema</span>
                                <span class="absolute left-1 top-1 w-6 h-6 rounded-full bg-white dark:bg-neutral-800 shadow transition-transform duration-300"
                                      :class="darkMode ? 'translate-x-6' : ''"></span>
                                <span class="absolute left-2 top-2 text-yellow-400" x-show="!darkMode">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2" fill="currentColor"/>
                                        <path stroke="currentColor" stroke-width="2" d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                                    </svg>
                                </span>
                                <span class="absolute right-2 top-2 text-blue-300" x-show="darkMode">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/>
                                    </svg>
                                </span>
                            </button>
                            <span class="ml-2 text-sm font-semibold text-gray-700 dark:text-gray-100 select-none">
                                <template x-if="darkMode">
                                    <span>Modo oscuro</span>
                                </template>
                                <template x-if="!darkMode">
                                    <span>Modo claro</span>
                                </template>
                            </span>
                        </div>
                        <!-- Menú Principal -->
                        <nav class="flex-1 px-6 py-4 bg-white dark:bg-neutral-900 flex flex-col justify-start">
                            <a href="{{ route('home') }}" class="mb-1 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 transition {{ request()->routeIs('home') ? 'bg-blue-50 dark:bg-neutral-800 text-blue-700 dark:text-blue-200' : '' }}">
                                Inicio
                            </a>
                            <a href="{{ route('tienda.index') }}" class="mb-1 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 transition {{ request()->routeIs('tienda.index') ? 'bg-blue-50 dark:bg-neutral-800 text-blue-700 dark:text-blue-200' : '' }}">
                                Tienda
                            </a>
                            <a href="{{ route('blog.index') }}" class="mb-1 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 transition {{ request()->routeIs('blog.index') ? 'bg-blue-50 dark:bg-neutral-800 text-blue-700 dark:text-blue-200' : '' }}">
                                Blog
                            </a>
                            <a href="{{ route('contactos') }}" class="mb-1 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 transition {{ request()->routeIs('contactos') ? 'text-blue-700 dark:text-blue-300' : '' }}">
                                Contactos
                            </a>
                        </nav>
                        <!-- Sección Usuario -->
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-800 bg-white dark:bg-neutral-900">
                            @auth
                                <div class="flex items-center space-x-3 mb-4">
                                    <img class="w-10 h-10 rounded-full border-2 border-blue-300" 
                                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" 
                                         alt="Avatar de {{ Auth::user()->name }}">
                                    <div>
                                        <span class="block text-sm font-semibold text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</span>
                                        <span class="block text-xs text-gray-500 dark:text-blue-400">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 rounded-lg transition">
                                    Ver perfil
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-neutral-800 rounded-lg transition">
                                        Cerrar sesión
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-3 mb-2 text-center text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 rounded-lg transition">
                                    Iniciar sesión
                                </a>
                                <a href="{{ route('register') }}" class="block px-4 py-3 text-center text-blue-700 dark:text-blue-200 border-2 border-blue-700 dark:border-blue-400 hover:bg-blue-50 dark:hover:bg-neutral-800 rounded-lg transition">
                                    Registrarse
                                </a>
                            @endauth
                        </div>
                    </aside>
                </div>
            </div>
        </nav>

        <!-- Contenido -->
        <main class="flex-1 overflow-y-auto sm:p-4 md:p-6 bg-gray-50 dark:bg-black">
            <div class="max-w-full md:max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
