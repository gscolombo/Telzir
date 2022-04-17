<?php     
    class Simulation {
        private string $ddd_origin, $ddd_destiny, $base_price;
        private int $time;

        public function  __construct($ddd_origin, $ddd_destiny, $time, $tax) {
            $this -> ddd_origin = $ddd_origin;
            $this -> ddd_destiny = $ddd_destiny;
            $this -> time = $time;
            $this -> base_price = $tax * $this -> time;
        }

        public function getter($property) {
            return $this -> {$property};
        }
        
        public function get_promo_price($threshold) {
            $over_threshold = $this -> time - $threshold > 0;
            $price = ($this -> time - $threshold) * 1.1;
            $discount = (1 - ($price / $this -> base_price)) * 100;

            return [
                "price" => $over_threshold ? "R$" . number_format($price, 2, ","): "Sem custo",
                "discount" => $over_threshold ? "-" . number_format($discount, 0, ",") . "%" : ""
            ];
        }
    }
?>