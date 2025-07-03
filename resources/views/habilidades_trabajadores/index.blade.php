<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Habilidades de Trabajadores</h1>
            <a href="{{ route('habilidades-trabajadores.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nueva Habilidad</a>
        </div>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-blue-700 dark:text-blue-400">
                        <th>ID Trabajador</th>
                        <th>Tipo de Labor</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($habilidades as $habilidad)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>{{ $habilidad->id_trabajador }}</td>
                            <td>{{ $habilidad->tipo_labor }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('habilidades-trabajadores.show', [$habilidad->id_trabajador, $habilidad->tipo_labor]) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Ver</a>
                                <a href="{{ route('habilidades-trabajadores.edit', [$habilidad->id_trabajador, $habilidad->tipo_labor]) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('habilidades-trabajadores.destroy', [$habilidad->id_trabajador, $habilidad->tipo_labor]) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta habilidad?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($habilidades->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">No hay habilidades registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
