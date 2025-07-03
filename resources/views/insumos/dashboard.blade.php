<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 animate-fade-in">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-700 dark:text-blue-400 mb-2 drop-shadow">Panel de Insumos</h1>
            <p class="text-lg text-gray-700 dark:text-gray-200">
                Bienvenido, {{ Auth::user()->name }}.<br>
                Aquí tienes un resumen de los módulos que puedes gestionar.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <a href="{{ route('quimicos.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-teal-50 dark:hover:bg-teal-950 cursor-pointer">
                <div class="text-5xl font-bold text-teal-700 dark:text-teal-400 mb-2">{{ $stats['Químicos'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Químicos</div>
            </a>
            <a href="{{ route('uso-quimicos.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-lime-50 dark:hover:bg-lime-950 cursor-pointer">
                <div class="text-5xl font-bold text-lime-700 dark:text-lime-400 mb-2">{{ $stats['Uso de Químico'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Uso de Químico</div>
            </a>
            <a href="{{ route('maquinarias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-purple-50 dark:hover:bg-purple-950 cursor-pointer">
                <div class="text-5xl font-bold text-purple-700 dark:text-purple-400 mb-2">{{ $stats['Maquinarias'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Maquinarias</div>
            </a>
            <a href="{{ route('mantenimiento-maquinarias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-pink-50 dark:hover:bg-pink-950 cursor-pointer">
                <div class="text-5xl font-bold text-pink-700 dark:text-pink-400 mb-2">{{ $stats['Mantenimientos'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Mantenimientos</div>
            </a>
            <a href="{{ route('uso-maquinarias.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-cyan-50 dark:hover:bg-cyan-950 cursor-pointer">
                <div class="text-5xl font-bold text-cyan-700 dark:text-cyan-400 mb-2">{{ $stats['Uso de Maquinaria'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Uso de Maquinaria</div>
            </a>
        </div>
    </div>
</x-app-layout>
