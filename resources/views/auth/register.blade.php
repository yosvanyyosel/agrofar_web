<x-app-layout>
    <div class="flex justify-center items-center min-h-[70vh] animate-fade-in">
        <div class="w-full max-w-md bg-white/90 dark:bg-neutral-900/90 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-neutral-800">
            <h2 class="text-3xl font-extrabold text-blue-700 dark:text-blue-400 mb-6 text-center">Crear cuenta</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        class="form-input w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                        required autofocus>
                    @error('name')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="form-input w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('email')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Contraseña</label>
                    <input id="password" type="password" name="password"
                        class="form-input w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('password')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirmación de Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="form-input w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Rol -->
                <div>
                    <label for="role" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Rol</label>
                    <select name="role" id="role"
                        class="form-select w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Selecciona un rol</option>
                        <option value="admin_user" {{ old('role') == 'admin_user' ? 'selected' : '' }}>Administrador</option>
                        <option value="analista_user" {{ old('role') == 'analista_user' ? 'selected' : '' }}>Analista</option>
                        <option value="insumos_user" {{ old('role') == 'insumos_user' ? 'selected' : '' }}>Gestor de Insumos</option>
                        <option value="personal_user" {{ old('role') == 'personal_user' ? 'selected' : '' }}>Gestor de Personal</option>
                    </select>
                    @error('role')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <button type="submit"
                    class="w-full py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition shadow">
                    Registrarse
                </button>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-blue-700 dark:text-blue-400 hover:underline text-sm">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>
</x-app-layout>
