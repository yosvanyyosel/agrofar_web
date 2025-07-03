<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Uso de Maquinarias</h1>
            <a href="{{ route('uso-maquinarias.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nuevo Uso</a>
        </div>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-blue-700 dark:text-blue-400">
                        <th>ID Maquinaria</th>
                        <th>ID Tarea</th>
                        <th>Combustible Consumido</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usos as $uso)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>{{ $uso->id_maquinaria }}</td>
                            <td>{{ $uso->id_tarea }}</td>
                            <td>{{ $uso->combustible_consumido }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('uso-maquinarias.show', [$uso->id_maquinaria, $uso->id_tarea]) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Ver</a>
                                <a href="{{ route('uso-maquinarias.edit', [$uso->id_maquinaria, $uso->id_tarea]) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('uso-maquinarias.destroy', [$uso->id_maquinaria, $uso->id_tarea]) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($usos->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">No hay registros de uso de maquinaria.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
