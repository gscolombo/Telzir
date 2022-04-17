<?php
    require "./src/Models/Database.php";
    
    try {
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $database = new Database($pdo);
    } catch(PDOException $e) {
        echo "Connection to the databank failed. Error:";
        echo $e -> getMessage();
        die();
    }
?>