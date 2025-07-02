<x-app-layout>
    <x-slot name="meta">
        <title>Iniciar sesión | YosvApps</title>
        <meta name="description" content="Accede a tu cuenta de YosvApps para gestionar tus aplicaciones, compras y preferencias.">
        <meta name="keywords" content="login, acceso, iniciar sesión, YosvApps, usuario, autenticación">
    </x-slot>

    <section class="bg-white dark:bg-black transition-colors duration-300 py-16 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white dark:bg-neutral-900 rounded-2xl shadow-xl border border-blue-100 dark:border-neutral-800 p-8 animate-fade-in">
                <!-- Logo -->
                <div class="flex justify-center mb-8">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.svg') }}" alt="YosvApps" class="h-12 w-auto dark:invert" />
                    </a>
                </div>

                <!-- Mensajes de error y estado -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600 dark:text-red-400 text-sm list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Formulario de login -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Correo electrónico
                        </label>
                        <input id="email" name="email" type="email" autocomplete="username" required autofocus
                            class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition"
                            value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Contraseña
                        </label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition">
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center cursor-pointer">
                            <input id="remember_me" name="remember" type="checkbox"
                                   class="rounded border-gray-300 dark:border-neutral-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Recordarme</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-700 dark:text-blue-400 hover:underline font-semibold transition">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center items-center px-6 py-3 bg-blue-700 dark:bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600">
                        Iniciar sesión
                    </button>
                </form>

                <div class="mt-8 text-center text-sm text-gray-500 dark:text-gray-300">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-blue-700 dark:text-blue-400 font-semibold hover:underline transition">Regístrate</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
