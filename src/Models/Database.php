<?php 
    namespace Telzir\Models;
    use PDO;

    class Database {
        private \PDO $connection;
        public function __construct($connection) {
            $this -> connection = $connection;
        }

        public function get_codes() {
            $query = "SELECT code FROM codes";
            $codes = $this -> connection -> query($query, PDO::FETCH_ASSOC);

            return $codes;
        }

        public function get_tax($origin, $destiny) {
            $sql = "SELECT price FROM taxes WHERE ddd_origin = :origin AND ddd_destiny = :destiny";
            $query = $this -> connection -> prepare($sql);
            $query -> execute(["origin" => $origin, "destiny" => $destiny]);
            $tax = $query -> fetch(PDO::FETCH_COLUMN);

            return $tax;
        }
    }
?>
