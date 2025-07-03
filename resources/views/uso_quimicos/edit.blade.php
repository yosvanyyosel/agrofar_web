<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Editar Uso de Químico</h2>
        <form method="POST" action="{{ route('uso-quimicos.update', [$uso->id_tarea, $uso->nombre_quimico]) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold mb-1">ID Tarea</label>
                <input type="number" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $uso->id_tarea }}" readonly>
            </div>
            <div>
                <label class="block font-semibold mb-1">Nombre Químico</label>
                <input type="text" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $uso->nombre_quimico }}" readonly>
            </div>
            <div>
                <label class="block font-semibold mb-1">Dosis/ha</label>
                <input type="number" step="0.01" name="dosis_ha" class="form-input w-full rounded-lg" required value="{{ old('dosis_ha', $uso->dosis_ha) }}">
                @error('dosis_ha') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Área Aplicada (ha)</label>
                <input type="number" step="0.01" name="area_aplicada_ha" class="form-input w-full rounded-lg" required value="{{ old('area_aplicada_ha', $uso->area_aplicada_ha) }}">
                @error('area_aplicada_ha') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Actualizar</button>
                <a href="{{ route('uso-quimicos.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
