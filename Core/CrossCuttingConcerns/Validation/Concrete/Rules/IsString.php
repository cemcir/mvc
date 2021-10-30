<?php
    final class IsString implements IRule {
        
        public static function Check($value) {
            $pattern="/^([a-zA-ZÇŞĞÜÖİçşğüöiı ]+)$/";
            if(!preg_match($pattern,$value)) { 
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Invalid;
        }
    }
?>