<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Nueva Producción</h2>
        <form method="POST" action="{{ route('producciones.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold mb-1">ID Producción</label>
                <input type="text" name="id_produccion" class="form-input w-full rounded-lg" required value="{{ old('id_produccion') }}">
                @error('id_produccion') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Área</label>
                <input type="text" name="area_id" class="form-input w-full rounded-lg" required value="{{ old('area_id') }}">
                @error('area_id') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Cultivo</label>
                <input type="text" name="cultivo" class="form-input w-full rounded-lg" required value="{{ old('cultivo') }}">
                @error('cultivo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Variedad</label>
                <input type="text" name="variedad" class="form-input w-full rounded-lg" required value="{{ old('variedad') }}">
                @error('variedad') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Estado</label>
                <input type="text" name="estado" class="form-input w-full rounded-lg" value="{{ old('estado') }}">
                @error('estado') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Guardar</button>
                <a href="{{ route('producciones.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
