<?php

// Este archivo permite que php -S dirija correctamente las rutas a Laravel

if (php_sapi_name() == 'cli-server') {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . '/public' . $url['path'];

    if (is_file($file)) {
        return false; // Sirve el archivo estático directamente
    }
}

require_once __DIR__ . '/public/index.php'; // Redirige todo a Laravel