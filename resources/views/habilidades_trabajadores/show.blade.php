<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Detalle de Habilidad</h2>
        <div class="mb-4">
            <span class="font-semibold">ID Trabajador:</span> {{ $habilidad->id_trabajador }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Tipo de Labor:</span> {{ $habilidad->tipo_labor }}
        </div>
        <div class="flex gap-4 mt-6">
            <a href="{{ route('habilidades-trabajadores.edit', [$habilidad->id_trabajador, $habilidad->tipo_labor]) }}" class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar</a>
            <a href="{{ route('habilidades-trabajadores.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Volver</a>
        </div>
    </div>
</x-app-layout>
