<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Detalle de Uso de Maquinaria</h2>
        <div class="mb-4">
            <span class="font-semibold">ID Maquinaria:</span> {{ $uso->id_maquinaria }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">ID Tarea:</span> {{ $uso->id_tarea }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Combustible Consumido:</span> {{ $uso->combustible_consumido }}
        </div>
        <div class="flex gap-4 mt-6">
            <a href="{{ route('uso-maquinarias.edit', [$uso->id_maquinaria, $uso->id_tarea]) }}" class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar</a>
            <a href="{{ route('uso-maquinarias.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Volver</a>
        </div>
    </div>
</x-app-layout>
