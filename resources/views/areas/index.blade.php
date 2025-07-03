<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Áreas</h1>
            <a href="{{ route('areas.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nueva Área</a>
        </div>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-blue-700 dark:text-blue-400">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Superficie (ha)</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $area)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>{{ $area->id_area }}</td>
                            <td>
                                <a href="{{ route('areas.show', $area->id_area) }}" class="text-blue-600 hover:underline">
                                    {{ $area->nombre }}
                                </a>
                            </td>
                            <td>{{ $area->superficie_ha }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('areas.edit', $area->id_area) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('areas.destroy', $area->id_area) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta área?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($areas->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">No hay áreas registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
