<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Editar Trabajador</h2>
        <form method="POST" action="{{ route('trabajadores.update', $trabajador->id_trabajador) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold mb-1">ID Trabajador</label>
                <input type="text" class="form-input w-full rounded-lg bg-gray-200 dark:bg-neutral-800" value="{{ $trabajador->id_trabajador }}" disabled>
            </div>
            <div>
                <label class="block font-semibold mb-1">Nombre</label>
                <input type="text" name="nombre" class="form-input w-full rounded-lg" required value="{{ old('nombre', $trabajador->nombre) }}">
                @error('nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Apellidos</label>
                <input type="text" name="apellidos" class="form-input w-full rounded-lg" required value="{{ old('apellidos', $trabajador->apellidos) }}">
                @error('apellidos') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-input w-full rounded-lg" required value="{{ old('fecha_nacimiento', $trabajador->fecha_nacimiento) }}">
                @error('fecha_nacimiento') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Escolaridad</label>
                <input type="text" name="escolaridad" class="form-input w-full rounded-lg" required value="{{ old('escolaridad', $trabajador->escolaridad) }}">
                @error('escolaridad') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Cargo</label>
                <input type="text" name="cargo" class="form-input w-full rounded-lg" value="{{ old('cargo', $trabajador->cargo) }}">
                @error('cargo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Salario mensual</label>
                <input type="number" step="0.01" name="salario_mensual" class="form-input w-full rounded-lg" required value="{{ old('salario_mensual', $trabajador->salario_mensual) }}">
                @error('salario_mensual') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Actualizar</button>
                <a href="{{ route('trabajadores.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
