<?php

// Configuración para mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Aumentar tiempo máximo de ejecución a 5 minutos
set_time_limit(300);

try {
    require __DIR__.'/bootstrap/autoload.php';

    $app = require_once __DIR__.'/bootstrap/app.php';
    $app->bind('path.public', function() {
        return __DIR__;
    });

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    $response->send();
    $kernel->terminate($request, $response);

} catch (Throwable $e) {
    // Captura cualquier error, incluyendo timeout u otros
    echo "Error al inicializar Laravel: " . $e->getMessage();
}
