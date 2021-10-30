<?php
    final class Length implements ILength {
        
        public static function Check($value,$length) {
            if(strlen($value)<$length) {
                return false;
            }
            return true;
        }

        public static function Message($length) {
            return "Bu alan minimum {$length} karakter olmalıdır";
        }
    }
?>