<x-app-layout>
    <x-slot name="meta">
        <title>Verifica tu correo | YosvApps</title>
        <meta name="description" content="Verifica tu dirección de correo electrónico para activar tu cuenta en YosvApps.">
        <meta name="keywords" content="verificación, email, correo, usuario, YosvApps, autenticación">
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
                    Antes de continuar, por favor verifica tu dirección de correo haciendo clic en el enlace que te acabamos de enviar.  
                    Si no recibiste el correo, podemos enviarte otro enlace de verificación.
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste.
                    </div>
                @endif

                <div class="mt-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                            class="w-full sm:w-auto flex justify-center items-center px-6 py-3 bg-blue-700 dark:bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600">
                            Reenviar correo de verificación
                        </button>
                    </form>

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <a href="{{ route('profile.show') }}"
                           class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition">
                            Editar perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
