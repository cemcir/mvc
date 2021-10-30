<?php
    final class Min implements IMin {

        public static function Check($value,$min) {
            if($value<$min) {
                return false;
            }
            return true;
        }

        public static function Message($min) {
            return "Bu alan minimum {$min} karakter olmalı";
        }

    }
?>