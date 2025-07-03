<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-neutral-900 rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">Nueva Vacación/Licencia</h2>
        <form method="POST" action="{{ route('vacaciones-licencias.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold mb-1">ID Trabajador</label>
                <input type="text" name="id_trabajador" class="form-input w-full rounded-lg" required value="{{ old('id_trabajador') }}">
                @error('id_trabajador') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="form-input w-full rounded-lg" required value="{{ old('fecha_inicio') }}">
                @error('fecha_inicio') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Fecha Fin</label>
                <input type="date" name="fecha_fin" class="form-input w-full rounded-lg" required value="{{ old('fecha_fin') }}">
                @error('fecha_fin') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Tipo de Ausencia</label>
                <input type="text" name="tipo_ausencia" class="form-input w-full rounded-lg" required value="{{ old('tipo_ausencia') }}">
                @error('tipo_ausencia') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1">Motivo</label>
                <input type="text" name="motivo" class="form-input w-full rounded-lg" value="{{ old('motivo') }}">
                @error('motivo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Guardar</button>
                <a href="{{ route('vacaciones-licencias.index') }}" class="px-6 py-2 bg-gray-300 dark:bg-neutral-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-neutral-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
