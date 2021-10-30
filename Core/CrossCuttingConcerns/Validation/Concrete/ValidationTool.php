<?php
    final class ValidationTool {

        public static function Validate($methods=[]) {
        
            foreach($methods as $method) {
                if($method->Success==false) {
                    return $method;
                }
            }
            return null;
        } 
    }
?>