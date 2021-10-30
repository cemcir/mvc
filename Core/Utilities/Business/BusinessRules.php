<?php
    class BusinessRules {

        public static function Run($methods=[]) {
            foreach($methods as $method) {
                if($method->Success==false) {
                    return $method;
                }
            }
            return null;
        }
    }
?>