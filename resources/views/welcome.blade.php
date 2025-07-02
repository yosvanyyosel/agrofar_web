<x-app-layout>
    <x-slot name="meta">
        <title>Inicio | Sitio web oficial de YosvApps</title>
        <meta name="description" content="Sitio web Oficial de YosvApps.">
        <meta name="author" content="YosvApps">
        <meta name="keywords" content="Laravel, Flutter, desarrollo web, programación, diseño, YosvApps, blog, recursos, tutoriales">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Sitio web Oficial de YosvApps.">
        <meta property="og:description" content="Recursos, tutoriales y novedades sobre Laravel, Flutter y desarrollo moderno.">
        <meta property="og:image" content="{{ asset('images/web-cover.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="YosvApps">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Sitio web Oficial de YosvApps.">
        <meta name="twitter:description" content="Sitio web Oficial de YosvApps.">
        <meta name="twitter:image" content="{{ asset('images/web-cover.jpg') }}">
    </x-slot>

    
    <section id="inicio" class="flex flex-col md:flex-row items-center justify-between max-w-7xl mx-auto py-20 px-4 gap-8">
    <div class="animate-fade-in">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4 text-blue-800 dark:text-blue-200 drop-shadow-lg">
            Hola, soy <span class="bg-gradient-to-r from-blue-500 to-indigo-600 bg-clip-text text-transparent">Yosvany Yosel</span>
        </h1>
        <p class="text-xl text-blue-700 dark:text-blue-100 font-semibold mb-2">
            Programador · Músico · Diseñador
        </p>
        <p class="text-lg text-gray-600 dark:text-blue-200 mb-8 max-w-xl font-medium">
            Desarrollador de aplicaciones y soluciones tecnológicas a medida. Me especializo en crear experiencias digitales modernas, resolver problemas técnicos y ayudarte a potenciar tus proyectos con tecnología elegante y eficiente.
        </p>
        <a href="#contacto" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white dark:text-blue-100 rounded-lg shadow-lg font-bold hover:scale-105 transition">
            Contáctame
        </a>
    </div>
    <img src="{{ asset('business-1730089_1280.jpg') }}" alt="Foto de perfil" class="w-56 h-56 rounded-full shadow-2xl border-4 border-blue-200 bg-white/80 animate-fade-in">
</section>





@include('lastest-apps')


</x-app-layout>
