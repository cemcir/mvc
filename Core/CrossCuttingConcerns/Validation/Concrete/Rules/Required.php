<?php
    final class Required implements IRule {

        public static function Check($value) {
            if(empty($value) && is_numeric($value)) {
                return true;
            }
            else if(empty($value)) {
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Required;
        }
    }
?>