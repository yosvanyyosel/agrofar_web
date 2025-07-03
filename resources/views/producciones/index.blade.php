<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Producciones</h1>
            <a href="{{ route('producciones.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nueva Producción</a>
        </div>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-blue-700 dark:text-blue-400">
                        <th>ID</th>
                        <th>Área</th>
                        <th>Cultivo</th>
                        <th>Variedad</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producciones as $produccion)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>{{ $produccion->id_produccion }}</td>
                            <td>{{ $produccion->area_id }}</td>
                            <td>{{ $produccion->cultivo }}</td>
                            <td>{{ $produccion->variedad }}</td>
                            <td>{{ $produccion->estado }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('producciones.show', $produccion->id_produccion) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Ver</a>
                                <a href="{{ route('producciones.edit', $produccion->id_produccion) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('producciones.destroy', $produccion->id_produccion) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta producción?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($producciones->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">No hay producciones registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
