<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 animate-fade-in">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-700 dark:text-blue-400 mb-2 drop-shadow">Panel del Analista</h1>
            <p class="text-lg text-gray-700 dark:text-gray-200">
                Bienvenido, {{ Auth::user()->name }}.<br>
                Aquí tienes un resumen de los módulos que puedes analizar y gestionar.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a href="{{ route('producciones.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-orange-50 dark:hover:bg-orange-950 cursor-pointer">
                <div class="text-5xl font-bold text-orange-700 dark:text-orange-400 mb-2">{{ $stats['Producciones'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Producciones</div>
            </a>
            <a href="{{ route('resultados-produccion.index') }}" class="group flex flex-col items-center bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-neutral-800 transition hover:scale-105 hover:shadow-2xl hover:bg-fuchsia-50 dark:hover:bg-fuchsia-950 cursor-pointer">
                <div class="text-5xl font-bold text-fuchsia-700 dark:text-fuchsia-400 mb-2">{{ $stats['Resultados'] }}</div>
                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Resultados</div>
            </a>
        </div>
    </div>
</x-app-layout>
