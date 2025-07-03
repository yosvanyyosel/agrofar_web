<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Trabajadores</h1>
            <a href="{{ route('trabajadores.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nuevo Trabajador</a>
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
                        <th>Apellidos</th>
                        <th>Cargo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trabajadores as $trabajador)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>{{ $trabajador->id_trabajador }}</td>
                            <td>
                                <a href="{{ route('trabajadores.show', $trabajador->id_trabajador) }}" class="text-blue-600 hover:underline">
                                    {{ $trabajador->nombre }}
                                </a>
                            </td>
                            <td>{{ $trabajador->apellidos }}</td>
                            <td>{{ $trabajador->cargo }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('trabajadores.edit', $trabajador->id_trabajador) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('trabajadores.destroy', $trabajador->id_trabajador) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este trabajador?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($trabajadores->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-4">No hay trabajadores registrados.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
