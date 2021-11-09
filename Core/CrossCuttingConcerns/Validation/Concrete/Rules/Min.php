<?php
    final class Min implements IMin {

        public static function Check($value,$min) { 
            if(strlen($value)<$min) { // verilen değerin minimum alabileceği karakter sayısını kontrol eder
                return false;
            }
            return true;
        }

        public static function Message($min) {
            return "Bu alan minimum {$min} karakter olmalı";
        }

    }
?>