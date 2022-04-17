<?php
    require "./src/Models/Simulation.php";

    $tax = $database -> get_tax($_POST["origin"], $_POST["destiny"]);
    if ($tax) {
        $simulation = new Simulation($_POST["origin"], $_POST["destiny"], $_POST["time"], $tax);
    } else {
        $alert = "Linha não disponível ainda!";
    }
?>