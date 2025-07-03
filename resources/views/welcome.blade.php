<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-[70vh] py-16 animate-fade-in">
        <div class="bg-white/80 dark:bg-neutral-900/80 rounded-2xl shadow-lg p-8 max-w-xl w-full text-center border border-gray-100 dark:border-neutral-800">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 dark:text-blue-400 mb-4 drop-shadow">Bienvenido a AGROFAR</h1>
            <p class="text-lg md:text-xl text-gray-700 dark:text-gray-200 mb-6">
                Plataforma de gestión agrícola moderna, eficiente y segura.<br>
                Accede a tus módulos según tu rol: Administrador, Analista, Gestor de Insumos o Gestor de Personal.
            </p>
            @guest
                <div class="flex flex-col md:flex-row gap-4 justify-center mt-4">
                    <a href="{{ route('login') }}" class="px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-3 rounded-lg border border-blue-700 text-blue-700 dark:text-blue-200 dark:border-blue-400 hover:bg-blue-50 dark:hover:bg-neutral-800 font-semibold transition shadow">
                        Registrarse
                    </a>
                </div>
            @else
                <div class="mt-6">
                    <span class="block text-lg text-gray-800 dark:text-gray-100 mb-2 font-semibold">
                        ¡Hola, {{ Auth::user()->name }}!
                    </span>
                    @auth
                        @if(Auth::user()->role === 'admin_user')
                            <a href="{{ route('admin.dashboard') }}" class="inline-block px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">Ir al panel</a>
                        @elseif(Auth::user()->role === 'analista_user')
                            <a href="{{ route('analista.dashboard') }}" class="inline-block px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">Ir al panel</a>
                        @elseif(Auth::user()->role === 'insumos_user')
                            <a href="{{ route('insumos.dashboard') }}" class="inline-block px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">Ir al panel</a>
                        @elseif(Auth::user()->role === 'personal_user')
                            <a href="{{ route('personal.dashboard') }}" class="inline-block px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">Ir al panel</a>
                        @endif
                    @endauth
                </div>
            @endguest
        </div>
    </div>
</x-app-layout>
