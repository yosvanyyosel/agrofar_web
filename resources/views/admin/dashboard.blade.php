<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-[70vh] animate-fade-in">
        <div class="bg-white/90 dark:bg-neutral-900/90 rounded-2xl shadow-lg p-10 max-w-2xl w-full text-center border border-gray-100 dark:border-neutral-800">
            <h1 class="text-4xl font-extrabold text-blue-700 dark:text-blue-400 mb-4 drop-shadow">Panel de Administración</h1>
            <p class="text-lg text-gray-700 dark:text-gray-200 mb-6">
                Bienvenido, {{ Auth::user()->name }}.<br>
                Aquí puedes gestionar toda la plataforma según tus permisos de <span class="font-bold">Administrador</span>.
            </p>
            <div class="flex flex-wrap justify-center gap-4 mt-6">
                <a href="{{ route('areas.index') }}" class="px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">
                    Áreas
                </a>
                <a href="{{ route('trabajadores.index') }}" class="px-6 py-3 rounded-lg bg-green-700 text-white font-semibold hover:bg-green-800 dark:bg-green-600 dark:hover:bg-green-700 transition shadow">
                    Trabajadores
                </a>
                <a href="{{ route('producciones.index') }}" class="px-6 py-3 rounded-lg bg-yellow-600 text-white font-semibold hover:bg-yellow-700 dark:bg-yellow-500 dark:hover:bg-yellow-600 transition shadow">
                    Producción
                </a>
                <!-- Agrega más accesos directos según tus módulos -->
            </div>
        </div>
    </div>
</x-app-layout>
