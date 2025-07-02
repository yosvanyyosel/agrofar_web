<x-app-layout>
    <x-slot name="meta">
        <title>Registrarse | YosvApps</title>
        <meta name="description" content="Crea tu cuenta en YosvApps para acceder a todas las funcionalidades de la plataforma.">
        <meta name="keywords" content="registro, crear cuenta, YosvApps, usuario, autenticación">
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

                <!-- Errores de validación -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600 dark:text-red-400 text-sm list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-6" x-data="{ showPassword: false, showPasswordConfirmation: false }">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Nombre
                        </label>
                        <input id="name" name="name" type="text" autocomplete="name" required autofocus
                            class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition"
                            value="{{ old('name') }}">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Correo electrónico
                        </label>
                        <input id="email" name="email" type="email" autocomplete="username" required
                            class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition"
                            value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Contraseña
                        </label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password" autocomplete="new-password" required
                                class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition pr-12">
                            <button type="button" tabindex="-1"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none"
                                @click="showPassword = !showPassword"
                                :aria-label="showPassword ? 'Ocultar contraseña' : 'Mostrar contraseña'">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="showPassword" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-7s4.477-7 10-7c1.657 0 3.21.335 4.625.925M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 7l-1.414-1.414M4.222 4.222L19.778 19.778"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Confirmar contraseña
                        </label>
                        <div class="relative">
                            <input :type="showPasswordConfirmation ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" autocomplete="new-password" required
                                class="block w-full px-4 py-3 rounded-xl border border-blue-200 dark:border-neutral-700 bg-white dark:bg-black text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition pr-12">
                            <button type="button" tabindex="-1"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none"
                                @click="showPasswordConfirmation = !showPasswordConfirmation"
                                :aria-label="showPasswordConfirmation ? 'Ocultar contraseña' : 'Mostrar contraseña'">
                                <svg x-show="!showPasswordConfirmation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="showPasswordConfirmation" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-7s4.477-7 10-7c1.657 0 3.21.335 4.625.925M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 7l-1.414-1.414M4.222 4.222L19.778 19.778"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div>
                            <label for="terms" class="flex items-center">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="rounded border-gray-300 dark:border-neutral-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                    {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-blue-700 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">'.__('Política de servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-blue-700 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">'.__('Política de privacidad').'</a>',
                                    ]) !!}
                                </span>
                            </label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 dark:focus:ring-blue-600 transition">
                            ¿Ya tienes cuenta?
                        </a>
                        <button type="submit"
                            class="ml-4 px-6 py-3 bg-blue-700 dark:bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        // AlpineJS is required for show/hide password functionality
    </script>
</x-app-layout>
