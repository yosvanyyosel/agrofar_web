<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Detalle de Labor</h2>
        <div class="mb-4">
            <span class="font-semibold">ID Labor:</span> {{ $labor->id_labor }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Nombre:</span> {{ $labor->nombre }}
        </div>
        <div class="flex gap-4 mt-6">
            <a href="{{ route('labors.edit', $labor->id_labor) }}" class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar</a>
            <a href="{{ route('labors.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Volver</a>
        </div>
    </div>
</x-app-layout>
