<?php
    final class Max implements IMax {

        public static function Check($value,$max) {
            if(strlen($value)>$max) {
                return false;
            }
            return true;
        }

        public static function Message($max) {
            return "Bu alan maximum {$max} karakter olmalı";
        }
    }
?>