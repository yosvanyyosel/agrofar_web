<?php

// Configuración de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de sesión segura*
/*ini_set('session.save_handler', 'memcached');
ini_set('session.save_path', '127.0.0.1:11211');
ini_set('session.use_strict_mode', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_secure', '0'); // 1 en producción
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.gc_maxlifetime', '1800');*/

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';