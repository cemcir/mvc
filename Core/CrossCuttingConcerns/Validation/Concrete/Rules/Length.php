<?php
    final class Length implements ILength {
        
        public static function Check($value,$length) {
            if(strlen($value)<$length) { // verilen değerin uzunluğunu strlen metodu ile kontrol eder 
                return false;
            }
            return true;
        }

        public static function Message($length) {
            return "Bu alan minimum {$length} karakter olmalıdır";
        }
    }
?>