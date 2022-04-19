<?php
    use Telzir\Models\Simulation;

    $tax = $database -> get_tax($_POST["origin"], $_POST["destiny"]);
    if ($tax) {
        $simulation = new Simulation($_POST["origin"], $_POST["destiny"], $_POST["time"], $tax);
    } else if ($_POST['origin'] === $_POST['destiny']) {
        $alert = "DDD de origem não pode ser igual ao DDD de destino";
    } else {
        $alert = "Linha indisponível";
    }
?>