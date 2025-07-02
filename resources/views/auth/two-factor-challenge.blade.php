<x-app-layout>
    <x-slot name="meta">
        <title>Verificación en dos pasos | YosvApps</title>
        <meta name="description" content="Confirma el acceso a tu cuenta de YosvApps ingresando el código de tu app autenticadora o un código de recuperación.">
        <meta name="keywords" content="2FA, autenticación, seguridad, YosvApps, código, recuperación, login">
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

                <div x-data="{ recovery: false }">
                    <div class="mb-4 text-sm text-gray-600 dark:text-blue-200" x-show="!recovery">
                        Por favor, confirma el acceso a tu cuenta ingresando el código proporcionado por tu aplicación autenticadora.
                    </div>
                    <div class="mb-4 text-sm text-gray-600 dark:text-blue-200" x-cloak x-show="recovery">
                        Por favor, confirma el acceso a tu cuenta ingresando uno de tus códigos de recuperación de emergencia.
                    </div>

                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="text-red-600 dark:text-red-400 text-sm list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('two-factor.login') }}" class="space-y-6">
                        @csrf

                        <div x-show="!recovery">
                            <label for="code" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                                Código de autenticación
                            </label>
                            <input id="code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" autofocus
                                class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition">
                        </div>

                        <div x-cloak x-show="recovery">
                            <label for="recovery_code" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                                Código de recuperación
                            </label>
                            <input id="recovery_code" name="recovery_code" type="text" autocomplete="one-time-code"
                                class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition">
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-end gap-2 mt-6">
                            <button type="button" class="text-sm text-blue-700 dark:text-blue-400 hover:underline focus:outline-none"
                                x-show="!recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                                Usar un código de recuperación
                            </button>
                            <button type="button" class="text-sm text-blue-700 dark:text-blue-400 hover:underline focus:outline-none"
                                x-cloak
                                x-show="recovery"
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                                Usar un código de autenticación
                            </button>
                            <button type="submit"
                                class="ml-auto px-6 py-3 bg-blue-700 dark:bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600">
                                Iniciar sesión
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
