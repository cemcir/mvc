<?php
    class BusinessRules { //Burası iş kurallarını kapsar Business katmanında birden fazla iş kuralı olduğunda
        // sürekli if blokları yazmamak için bu kod yazıldı

        public static function Run($methods=[]) {
            foreach($methods as $method) {
                if($method->Success==false) { //Burada geriye obje döner ErrorResult objesi
                    return $method;
                }
            }
            return null;
        }
    }
?>