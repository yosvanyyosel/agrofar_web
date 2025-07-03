<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Editar Labor</h2>
        <form method="POST" action="{{ route('labors.update', $labor->id_labor) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold mb-1">ID Labor</label>
                <input type="text" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $labor->id_labor }}" disabled>
            </div>
            <div>
                <label class="block font-semibold mb-1">Nombre</label>
                <input type="text" name="nombre" class="form-input w-full rounded-lg" required value="{{ old('nombre', $labor->nombre) }}">
                @error('nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Actualizar</button>
                <a href="{{ route('labors.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
