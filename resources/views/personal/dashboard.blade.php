<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 animate-fade-in">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-700 dark:text-blue-400 mb-2 drop-shadow">Panel de Personal</h1>
            <p class="text-lg text-gray-700 dark:text-gray-200">
                Bienvenido, {{ Auth::user()->name }}.<br>
                Aquí tienes un resumen de los módulos que puedes gestionar.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6">
            <a href="{{ route('trabajadores.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-green-50 dark:hover:bg-green-950 cursor-pointer">
                <div class="text-5xl font-bold text-green-700 dark:text-green-400 mb-2">{{ $stats['Trabajadores'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Trabajadores</div>
            </a>
            <a href="{{ route('tareas.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-red-50 dark:hover:bg-red-950 cursor-pointer">
                <div class="text-5xl font-bold text-red-700 dark:text-red-400 mb-2">{{ $stats['Tareas'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Tareas</div>
            </a>
            <a href="{{ route('habilidades-trabajadores.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-indigo-50 dark:hover:bg-indigo-950 cursor-pointer">
                <div class="text-5xl font-bold text-indigo-700 dark:text-indigo-400 mb-2">{{ $stats['Habilidades'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Habilidades</div>
            </a>
            <a href="{{ route('vacaciones-licencias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer">
                <div class="text-5xl font-bold text-gray-700 dark:text-gray-200 mb-2">{{ $stats['Vacaciones/Licencias'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Vacaciones/Licencias</div>
            </a>
        </div>
    </div>
</x-app-layout>
