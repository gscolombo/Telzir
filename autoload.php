<?php
    spl_autoload_register(function ($class_namespace) {
        $path = str_replace("Telzir", "src", $class_namespace);
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
        $path .= ".php";
        
        if (file_exists($path)) {
            require_once $path;
        }
    });
?>