<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Tareas</h1>
            <a href="{{ route('tareas.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nueva Tarea</a>
        </div>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-blue-700 dark:text-blue-400">
                        <th>ID</th>
                        <th>Trabajador</th>
                        <th>Labor</th>
                        <th>Producción</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $tarea)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>{{ $tarea->id_tarea }}</td>
                            <td>{{ $tarea->id_trabajador }}</td>
                            <td>{{ $tarea->id_labor }}</td>
                            <td>{{ $tarea->id_produccion }}</td>
                            <td>{{ $tarea->fecha_inicio }}</td>
                            <td>{{ $tarea->fecha_fin }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('tareas.show', $tarea->id_tarea) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Ver</a>
                                <a href="{{ route('tareas.edit', $tarea->id_tarea) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('tareas.destroy', $tarea->id_tarea) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta tarea?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($tareas->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">No hay tareas registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
