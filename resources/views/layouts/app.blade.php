<!DOCTYPE html>
<html lang="es"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', sidebarOpen: false }"
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
    <meta name="apple-mobile-web-app-title" content="AGROFAR">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <meta name="msapplication-TileColor" content="#1e3a8a">
    <meta name="msapplication-TileImage" content="/icons/icon-192.png">
    <meta name="application-name" content="AGROFAR">
    <title>AGROFAR</title>
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
    <div class="flex min-h-screen h-screen overflow-hidden">

        <!-- Sidebar fijo y scrollable -->
        <aside class="hidden md:flex flex-col justify-between w-64 bg-white dark:bg-neutral-900 border-r border-gray-100 dark:border-neutral-800 shadow-lg fixed left-0 top-0 h-screen z-40">
            <div class="flex flex-col h-full">
                <div class="flex items-center h-16 px-6 border-b border-gray-100 dark:border-neutral-800 flex-shrink-0">
                    <span class="text-2xl font-extrabold text-blue-700 dark:text-blue-400 tracking-tight">AGROFAR</span>
                </div>
                <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                    @auth
                        @if(Auth::user()->role === 'admin_user')
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800 {{ request()->is('/') ? 'bg-blue-100 dark:bg-neutral-800 text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                        @elseif(Auth::user()->role === 'analista_user')
                            <a href="{{ route('analista.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800 {{ request()->is('/') ? 'bg-blue-100 dark:bg-neutral-800 text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                        @elseif(Auth::user()->role === 'insumos_user')
                            <a href="{{ route('insumos.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800 {{ request()->is('/') ? 'bg-blue-100 dark:bg-neutral-800 text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                        @elseif(Auth::user()->role === 'personal_user')
                            <a href="{{ route('personal.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800 {{ request()->is('/') ? 'bg-blue-100 dark:bg-neutral-800 text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                        @endif
                    @endauth
                    
                    
                    @auth
                        @php $role = Auth::user()->role; @endphp
                        @if($role === 'admin_user' || $role === 'analista_user')
                            <a href="{{ route('producciones.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Producciones</a>
                            <a href="{{ route('resultados-produccion.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Resultados</a>
                        @endif
                        @if($role === 'admin_user' || $role === 'insumos_user')
                            <a href="{{ route('quimicos.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Químicos</a>
                            <a href="{{ route('uso-quimicos.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Uso de Químico</a>
                            <a href="{{ route('maquinarias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Maquinarias</a>
                            <a href="{{ route('mantenimiento-maquinarias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Mantenimientos</a>
                            <a href="{{ route('uso-maquinarias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Uso de Maquinaria</a>
                        @endif
                        @if($role === 'admin_user' || $role === 'personal_user')
                            <a href="{{ route('trabajadores.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Trabajadores</a>
                            <a href="{{ route('tareas.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Tareas</a>
                            <a href="{{ route('habilidades-trabajadores.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Habilidades</a>
                            <a href="{{ route('vacaciones-licencias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Vacaciones/Licencias</a>
                        @endif
                        @if($role === 'admin_user')
                            <a href="{{ route('areas.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Áreas</a>
                            <a href="{{ route('labors.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Labores</a>
                        @endif
                    @endauth
                </nav>
                <div class="mt-auto p-4 border-t border-gray-100 dark:border-neutral-800">
                    @auth
                        <!--<div class="flex items-center gap-3 mb-4">
                            <img class="w-10 h-10 rounded-full border-2 border-blue-300" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar">
                            <div>
                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</span>
                                <span class="block text-xs text-gray-500 dark:text-blue-400">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 rounded-lg transition">
                            Ver perfil
                        </a>--->
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
                    <button @click="darkMode = !darkMode"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 dark:bg-neutral-800 hover:bg-blue-50 dark:hover:bg-neutral-700 transition w-full mt-4">
                        <svg x-show="!darkMode" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="5"/><path d="M10 1v2M10 17v2M4.22 4.22l1.42 1.42M15.36 15.36l1.42 1.42M1 10h2M17 10h2M4.22 15.78l1.42-1.42M15.36 4.64l1.42-1.42"/></svg>
                        <svg x-show="darkMode" class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/></svg>
                        <span x-text="darkMode ? 'Modo oscuro' : 'Modo claro'"></span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Sidebar móvil -->
        <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-200"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               class="fixed z-50 inset-y-0 left-0 w-64 bg-white dark:bg-neutral-900 shadow-lg flex flex-col md:hidden">
            <div class="flex items-center h-16 px-6 border-b border-gray-100 dark:border-neutral-800">
                <span class="text-2xl font-extrabold text-blue-700 dark:text-blue-400 tracking-tight">AGROFAR</span>
                <button class="ml-auto" @click="sidebarOpen = false">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                <a href="{{ url('/') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800 {{ request()->is('/') ? 'bg-blue-100 dark:bg-neutral-800 text-blue-700 dark:text-blue-400' : '' }}">Inicio</a>
                @auth
                    @php $role = Auth::user()->role; @endphp
                    @if($role === 'admin_user' || $role === 'analista_user')
                        <a href="{{ route('producciones.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Producciones</a>
                        <a href="{{ route('resultados-produccion.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Resultados</a>
                    @endif
                    @if($role === 'admin_user' || $role === 'insumos_user')
                        <a href="{{ route('quimicos.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Químicos</a>
                        <a href="{{ route('uso-quimicos.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Uso de Químico</a>
                        <a href="{{ route('maquinarias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Maquinarias</a>
                        <a href="{{ route('mantenimiento-maquinarias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Mantenimientos</a>
                        <a href="{{ route('uso-maquinarias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Uso de Maquinaria</a>
                    @endif
                    @if($role === 'admin_user' || $role === 'personal_user')
                        <a href="{{ route('trabajadores.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Trabajadores</a>
                        <a href="{{ route('tareas.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Tareas</a>
                        <a href="{{ route('habilidades-trabajadores.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Habilidades</a>
                        <a href="{{ route('vacaciones-licencias.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Vacaciones/Licencias</a>
                    @endif
                    @if($role === 'admin_user')
                        <a href="{{ route('areas.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Áreas</a>
                        <a href="{{ route('labors.index') }}" class="block px-4 py-2 rounded-lg hover:bg-blue-50 dark:hover:bg-neutral-800">Labores</a>
                    @endif
                @endauth
            </nav>
            <div class="mt-auto p-4 border-t border-gray-100 dark:border-neutral-800">
                @auth
                    <!--<div class="flex items-center gap-3 mb-4">
                        <img class="w-10 h-10 rounded-full border-2 border-blue-300" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar">
                        <div>
                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</span>
                            <span class="block text-xs text-gray-500 dark:text-blue-400">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-100 hover:bg-blue-50 dark:hover:bg-neutral-800 rounded-lg transition">
                        Ver perfil
                    </a>--->
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
                <button @click="darkMode = !darkMode"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 dark:bg-neutral-800 hover:bg-blue-50 dark:hover:bg-neutral-700 transition w-full mt-4">
                    <svg x-show="!darkMode" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="5"/><path d="M10 1v2M10 17v2M4.22 4.22l1.42 1.42M15.36 15.36l1.42 1.42M1 10h2M17 10h2M4.22 15.78l1.42-1.42M15.36 4.64l1.42-1.42"/></svg>
                    <svg x-show="darkMode" class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/></svg>
                    <span x-text="darkMode ? 'Modo oscuro' : 'Modo claro'"></span>
                </button>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 ml-0 md:ml-64 h-screen overflow-y-auto bg-gray-50 dark:bg-black">
            <div class="max-w-full md:max-w-7xl mx-auto p-4 md:p-8">
                {{ $slot ?? '' }}
            </div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</
