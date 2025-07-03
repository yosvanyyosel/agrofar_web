<x-app-layout>
    <div class="relative isolate min-h-[90vh] flex items-center justify-center bg-gradient-to-br from-blue-50/80 via-white/90 to-blue-100/80 dark:from-blue-950 dark:via-black dark:to-blue-900 animate-fade-in">
        <div class="absolute inset-0 pointer-events-none select-none">
            <svg class="absolute -top-20 -left-20 w-96 h-96 opacity-30 dark:opacity-20" viewBox="0 0 400 400" fill="none">
                <circle cx="200" cy="200" r="200" fill="#3B82F6"/>
            </svg>
            <svg class="absolute bottom-0 right-0 w-80 h-80 opacity-20 dark:opacity-10" viewBox="0 0 320 320" fill="none">
                <circle cx="160" cy="160" r="160" fill="#1e40af"/>
            </svg>
        </div>
        <div class="z-10 max-w-2xl w-full bg-white/90 dark:bg-neutral-900/90 rounded-2xl shadow-xl p-10 border border-gray-100 dark:border-neutral-800 flex flex-col items-center text-center">
           <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 dark:text-blue-400 mb-4 drop-shadow">Bienvenido a AGROFAR</h1>
            <p class="text-lg md:text-xl text-gray-700 dark:text-gray-200 mb-8">
                Plataforma de gestión agrícola <span class="font-bold text-blue-700 dark:text-blue-400">moderna</span>, <span class="font-bold text-green-700 dark:text-green-400">eficiente</span> y <span class="font-bold text-yellow-600 dark:text-yellow-400">segura</span>.<br>
                Optimiza tu empresa con módulos para <span class="font-semibold">Administradores, Analistas, Gestores de Insumos y Gestores de Personal</span>.
            </p>
            @guest
            <div class="flex flex-col md:flex-row gap-4 justify-center mt-2">
                <a href="{{ route('login') }}" class="px-8 py-3 rounded-lg bg-blue-700 text-white font-semibold text-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow-lg">
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}" class="px-8 py-3 rounded-lg border-2 border-blue-700 text-blue-700 dark:text-blue-200 dark:border-blue-400 hover:bg-blue-50 dark:hover:bg-neutral-800 font-semibold text-lg transition shadow-lg">
                    Registrarse
                </a>
            </div>
            @endguest
        </div>
    </div>
</x-app-layout>
