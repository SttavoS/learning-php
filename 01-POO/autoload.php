<?php

spl_autoload_register(function (string $class) {
    $vendorNamespace = 'Alura\\Banco';
    $baseDir = __DIR__ . '/src';

    $filePath = str_replace($vendorNamespace, $baseDir, $class);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath);
    $filePath .= '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});
