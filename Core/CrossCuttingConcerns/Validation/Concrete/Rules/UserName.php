<?php
    final class UserName implements IRule {

        public static function Check($value) {
            $pattern="/^([a-zA-Z0-9]{6,30})$/";
            if(!preg_match($pattern,$value) || $value[0]=="0") {
                return false;
            }              
            return true;
        }

        public static function Message() {

        }
    }
?>