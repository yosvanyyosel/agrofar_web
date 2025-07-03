<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Nuevo Químico</h2>
        <form method="POST" action="{{ route('quimicos.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Nombre</label>
                <input type="text" name="nombre" class="form-input w-full rounded-lg" required value="{{ old('nombre') }}">
                @error('nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Tipo</label>
                <input type="text" name="tipo" class="form-input w-full rounded-lg" required value="{{ old('tipo') }}">
                @error('tipo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Unidad de Medida</label>
                <input type="text" name="unidad_medida" class="form-input w-full rounded-lg" required value="{{ old('unidad_medida') }}">
                @error('unidad_medida') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Cantidad Disponible</label>
                <input type="number" step="0.01" name="cantidad_disponible" class="form-input w-full rounded-lg" required value="{{ old('cantidad_disponible') }}">
                @error('cantidad_disponible') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Precio Unitario</label>
                <input type="number" step="0.01" name="precio_unitario" class="form-input w-full rounded-lg" required value="{{ old('precio_unitario') }}">
                @error('precio_unitario') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Dosis Máxima/ha</label>
                <input type="number" step="0.01" name="dosis_maxima_ha" class="form-input w-full rounded-lg" required value="{{ old('dosis_maxima_ha') }}">
                @error('dosis_maxima_ha') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Guardar</button>
                <a href="{{ route('quimicos.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
