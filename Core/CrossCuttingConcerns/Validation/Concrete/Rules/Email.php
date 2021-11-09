<?php
    final class Email implements IRule {

        public static function Check($value) {
            if(!filter_var($value,FILTER_VALIDATE_EMAIL)) { // email doğrulama kodu
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Invalid;
        }

    }
?>