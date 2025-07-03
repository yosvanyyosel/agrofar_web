<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Editar Uso de Maquinaria</h2>
        <form method="POST" action="{{ route('uso-maquinarias.update', [$uso->id_maquinaria, $uso->id_tarea]) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold mb-1">ID Maquinaria</label>
                <input type="text" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $uso->id_maquinaria }}" readonly>
            </div>
            <div>
                <label class="block font-semibold mb-1">ID Tarea</label>
                <input type="number" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $uso->id_tarea }}" readonly>
            </div>
            <div>
                <label class="block font-semibold mb-1">Combustible Consumido</label>
                <input type="number" step="0.01" name="combustible_consumido" class="form-input w-full rounded-lg" required value="{{ old('combustible_consumido', $uso->combustible_consumido) }}">
                @error('combustible_consumido') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Actualizar</button>
                <a href="{{ route('uso-maquinarias.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
