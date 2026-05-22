<?php
spl_autoload_register(function ($className) {
    // On enlève le namespace App\
    $className = str_replace('App\\', '', $className);

    // Transforme les backslashes en slashes pour le chemin
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Classe introuvable : $className -> $file";
    }
});