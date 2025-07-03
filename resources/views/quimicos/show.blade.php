<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Detalle de Químico</h2>
        <div class="mb-4">
            <span class="font-semibold">Nombre:</span> {{ $quimico->nombre }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Tipo:</span> {{ $quimico->tipo }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Unidad de Medida:</span> {{ $quimico->unidad_medida }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Cantidad Disponible:</span> {{ $quimico->cantidad_disponible }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Precio Unitario:</span> ${{ number_format($quimico->precio_unitario, 2) }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Dosis Máxima/ha:</span> {{ $quimico->dosis_maxima_ha }}
        </div>
        <div class="flex gap-4 mt-6">
            <a href="{{ route('quimicos.edit', $quimico->nombre) }}" class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar</a>
            <a href="{{ route('quimicos.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Volver</a>
        </div>
    </div>
</x-app-layout>
