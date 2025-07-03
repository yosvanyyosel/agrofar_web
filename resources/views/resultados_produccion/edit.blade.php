<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Editar Resultado</h2>
        <form method="POST" action="{{ route('resultados-produccion.update', $resultado->id_produccion) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold mb-1">ID Producción</label>
                <input type="text" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $resultado->id_produccion }}" readonly>
            </div>
            <div>
                <label class="block font-semibold mb-1">Cantidad Producida</label>
                <input type="number" step="0.01" name="cantidad_producida" class="form-input w-full rounded-lg" required value="{{ old('cantidad_producida', $resultado->cantidad_producida) }}">
                @error('cantidad_producida') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Unidad de Medida</label>
                <input type="text" name="unidad_medida" class="form-input w-full rounded-lg" required value="{{ old('unidad_medida', $resultado->unidad_medida) }}">
                @error('unidad_medida') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Fecha de Cosecha</label>
                <input type="date" name="fecha_cosecha" class="form-input w-full rounded-lg" required value="{{ old('fecha_cosecha', $resultado->fecha_cosecha) }}">
                @error('fecha_cosecha') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Destino</label>
                <input type="text" name="destino" class="form-input w-full rounded-lg" required value="{{ old('destino', $resultado->destino) }}">
                @error('destino') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Actualizar</button>
                <a href="{{ route('resultados-produccion.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
