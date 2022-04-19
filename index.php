<?php
    require_once "autoload.php";
    require_once "config.php";
    require_once "db.php";

    if (array_key_exists("origin", $_POST) && array_key_exists("destiny", $_POST) && array_key_exists("time", $_POST)) {
        require "./src/Controllers/simulate.php";
    }
    
    require "./src/Views/template.php";
?>