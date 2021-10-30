<?php
    final class Password implements IRule {
        
        public static function Check($value) {

            $uppercase = preg_match('@[A-Z]@', $value);
            $lowercase = preg_match('@[a-z]@', $value);
            $number = preg_match('@[0-9]@', $value);
            $specialChars = preg_match('@[^\w]@', $value);
            $whiteSpace=preg_match('@[ ]@',$value);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($value)<8 || $whiteSpace) {
                return false;
            }
            return true;
        }

        public static function Message() {
            
        }
    }

?>