<?php
    final class Number implements IRule {

        public static function Check($value) {
            if(!is_numeric($value)) { // verilen değer sayı mı kontrol et
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Number;
        }

    }
?>