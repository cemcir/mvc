<?php
    final class IsString implements IRule {
        
        public static function Check($value) {
            if(!is_string($value)) { // verilen değerin string olup olmadığına bakar
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Invalid;
        }
    }
?>