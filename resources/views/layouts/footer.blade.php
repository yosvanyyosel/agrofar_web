<footer class="bg-white/90 dark:bg-black border-t border-blue-100 dark:border-neutral-800 shadow-inner animate-fade-in text-gray-500 dark:text-gray-200">
    <div class="max-w-7xl mx-auto px-4 py-10 sm:py-8 flex flex-col md:flex-row md:justify-between md:items-start gap-8">
        <!-- Branding y Descripción -->
        <div class="flex-1 mb-6 md:mb-0">
            <div class="flex items-center space-x-2 mb-2">
                <span class="text-2xl font-extrabold text-blue-700 dark:text-blue-300">YosvApps</span>
            </div>
            <p class="text-gray-500 dark:text-gray-300 text-sm max-w-xs">
                Soluciones digitales elegantes y modernas para tu negocio. Desarrollamos aplicaciones web y móviles con pasión y excelencia.
            </p>
        </div>
        <!-- Enlaces de Interés -->
        <div class="flex-1">
            <h3 class="text-gray-700 dark:text-gray-100 font-semibold mb-2">Enlaces</h3>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('tienda.index') }}" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">Tienda</a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">Blog</a>
                </li>
                <li>
                    <a href="{{ route('contactos') }}" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">Contacto</a>
                </li>
            </ul>
        </div>
        <!-- Información y Redes -->
        <div class="flex-1">
            <h3 class="text-gray-700 dark:text-gray-100 font-semibold mb-2">Información</h3>
            <ul class="space-y-1">
                <li>
                    <a href="#" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">Política de privacidad</a>
                </li>
                <li>
                    <a href="/terms" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">Términos y condiciones</a>
                </li>
                <li>
                    <a href="mailto:yosvapps@nauta.cu" class="text-gray-500 dark:text-gray-200 hover:text-blue-700 dark:hover:text-blue-400 transition">yosvapps@nauta.cu</a>
                </li>
            </ul>
            <!-- Redes sociales (puedes descomentar si lo deseas) -->
            <!--
            <div class="flex space-x-3 mt-4">
                <a href="#" class="text-blue-400 hover:text-blue-700 dark:hover:text-blue-200 transition" aria-label="Twitter">
                    ... (icono)
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-700 dark:hover:text-blue-200 transition" aria-label="Facebook">
                    ... (icono)
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-700 dark:hover:text-blue-200 transition" aria-label="Instagram">
                    ... (icono)
                </a>
            </div>
            -->
        </div>
    </div>
    <div class="border-t border-blue-100 dark:border-neutral-800 mt-6 py-4 text-center text-gray-400 dark:text-gray-400 text-xs bg-white/80 dark:bg-neutral-900/90">
        &copy; {{ date('Y') }} YosvApps. Todos los derechos reservados.
    </div>
</footer>
