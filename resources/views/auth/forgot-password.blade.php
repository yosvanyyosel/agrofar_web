<x-app-layout>
    <x-slot name="meta">
        <title>Recuperar contraseña | YosvApps</title>
        <meta name="description" content="Solicita el enlace para restablecer tu contraseña en YosvApps.">
        <meta name="keywords" content="recuperar, contraseña, restablecer, password, YosvApps, acceso, usuario">
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

                <div class="mb-4 text-sm text-gray-600 dark:text-blue-200">
                    ¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo y te enviaremos un enlace para restablecerla.
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600 dark:text-red-400 text-sm list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Correo electrónico
                        </label>
                        <input id="email" name="email" type="email" autocomplete="username" required autofocus
                            class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition"
                            value="{{ old('email') }}">
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center items-center px-6 py-3 bg-blue-700 dark:bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600">
                        Enviar enlace de recuperación
                    </button>
                </form>

                <div class="mt-8 text-center text-sm text-gray-500 dark:text-gray-300">
                    <a href="{{ route('login') }}" class="text-blue-700 dark:text-blue-400 font-semibold hover:underline transition">Volver a iniciar sesión</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
