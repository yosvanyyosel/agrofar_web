<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400">Químicos</h1>
            <a href="{{ route('quimicos.create') }}" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">Nuevo Químico</a>
        </div>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-blue-700 dark:text-blue-400">
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quimicos as $quimico)
                        <tr class="border-t border-gray-200 dark:border-neutral-800">
                            <td>
                                <a href="{{ route('quimicos.show', $quimico->nombre) }}" class="text-blue-600 hover:underline">
                                    {{ $quimico->nombre }}
                                </a>
                            </td>
                            <td>{{ $quimico->tipo }}</td>
                            <td>{{ $quimico->unidad_medida }}</td>
                            <td>{{ $quimico->cantidad_disponible }}</td>
                            <td>${{ number_format($quimico->precio_unitario, 2) }}</td>
                            <td class="flex gap-2 justify-center py-2">
                                <a href="{{ route('quimicos.edit', $quimico->nombre) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('quimicos.destroy', $quimico->nombre) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este químico?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($quimicos->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">No hay químicos registrados.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
