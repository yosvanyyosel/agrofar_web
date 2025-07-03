<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 animate-fade-in">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-700 dark:text-blue-400 mb-2 drop-shadow">Panel de Administración</h1>
            <p class="text-lg text-gray-700 dark:text-gray-200">
                Bienvenido, {{ Auth::user()->name }}.<br>
                Aquí tienes un resumen general de la plataforma.<br>
                Haz clic en cualquier módulo para gestionarlo.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <a href="{{ route('areas.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-blue-50 dark:hover:bg-blue-950 cursor-pointer">
                <div class="text-5xl font-bold text-blue-700 dark:text-blue-400 mb-2">{{ $stats['Áreas'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Áreas</div>
            </a>
            <a href="{{ route('trabajadores.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-green-50 dark:hover:bg-green-950 cursor-pointer">
                <div class="text-5xl font-bold text-green-700 dark:text-green-400 mb-2">{{ $stats['Trabajadores'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Trabajadores</div>
            </a>
            <a href="{{ route('labors.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-yellow-50 dark:hover:bg-yellow-950 cursor-pointer">
                <div class="text-5xl font-bold text-yellow-600 dark:text-yellow-400 mb-2">{{ $stats['Labores'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Labores</div>
            </a>
            <a href="{{ route('habilidades-trabajadores.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-indigo-50 dark:hover:bg-indigo-950 cursor-pointer">
                <div class="text-5xl font-bold text-indigo-700 dark:text-indigo-400 mb-2">{{ $stats['Habilidades'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Habilidades</div>
            </a>
            <a href="{{ route('maquinarias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-purple-50 dark:hover:bg-purple-950 cursor-pointer">
                <div class="text-5xl font-bold text-purple-700 dark:text-purple-400 mb-2">{{ $stats['Maquinarias'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Maquinarias</div>
            </a>
            <a href="{{ route('mantenimiento-maquinarias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-pink-50 dark:hover:bg-pink-950 cursor-pointer">
                <div class="text-5xl font-bold text-pink-700 dark:text-pink-400 mb-2">{{ $stats['Mantenimientos'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Mantenimientos</div>
            </a>
            <a href="{{ route('producciones.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-orange-50 dark:hover:bg-orange-950 cursor-pointer">
                <div class="text-5xl font-bold text-orange-700 dark:text-orange-400 mb-2">{{ $stats['Producciones'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Producciones</div>
            </a>
            <a href="{{ route('quimicos.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-teal-50 dark:hover:bg-teal-950 cursor-pointer">
                <div class="text-5xl font-bold text-teal-700 dark:text-teal-400 mb-2">{{ $stats['Químicos'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Químicos</div>
            </a>
            <a href="{{ route('tareas.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-red-50 dark:hover:bg-red-950 cursor-pointer">
                <div class="text-5xl font-bold text-red-700 dark:text-red-400 mb-2">{{ $stats['Tareas'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Tareas</div>
            </a>
            <a href="{{ route('uso-maquinarias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-cyan-50 dark:hover:bg-cyan-950 cursor-pointer">
                <div class="text-5xl font-bold text-cyan-700 dark:text-cyan-400 mb-2">{{ $stats['Uso Maquinaria'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Uso de Maquinaria</div>
            </a>
            <a href="{{ route('uso-quimicos.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-lime-50 dark:hover:bg-lime-950 cursor-pointer">
                <div class="text-5xl font-bold text-lime-700 dark:text-lime-400 mb-2">{{ $stats['Uso Químico'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Uso de Químico</div>
            </a>
            <a href="{{ route('resultados-produccion.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-fuchsia-50 dark:hover:bg-fuchsia-950 cursor-pointer">
                <div class="text-5xl font-bold text-fuchsia-700 dark:text-fuchsia-400 mb-2">{{ $stats['Resultados'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Resultados</div>
            </a>
            <a href="{{ route('vacaciones-licencias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer">
                <div class="text-5xl font-bold text-gray-700 dark:text-gray-200 mb-2">{{ $stats['Vacaciones/Licencias'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Vacaciones/Licencias</div>
            </a>
        </div>
    </div>
</x-app-layout>
