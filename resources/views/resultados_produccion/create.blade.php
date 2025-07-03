<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Nuevo Resultado</h2>
        <form method="POST" action="{{ route('resultados-produccion.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold mb-1">ID Producción</label>
                <input type="text" name="id_produccion" class="form-input w-full rounded-lg" required value="{{ old('id_produccion') }}">
                @error('id_produccion') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Cantidad Producida</label>
                <input type="number" step="0.01" name="cantidad_producida" class="form-input w-full rounded-lg" required value="{{ old('cantidad_producida') }}">
                @error('cantidad_producida') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Unidad de Medida</label>
                <input type="text" name="unidad_medida" class="form-input w-full rounded-lg" required value="{{ old('unidad_medida') }}">
                @error('unidad_medida') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Fecha de Cosecha</label>
                <input type="date" name="fecha_cosecha" class="form-input w-full rounded-lg" required value="{{ old('fecha_cosecha') }}">
                @error('fecha_cosecha') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Destino</label>
                <input type="text" name="destino" class="form-input w-full rounded-lg" required value="{{ old('destino') }}">
                @error('destino') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Guardar</button>
                <a href="{{ route('resultados-produccion.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
