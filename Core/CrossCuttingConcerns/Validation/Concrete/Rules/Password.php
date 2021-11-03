<?php
    final class Password implements IRule {
        
        public static function Check($value) {

            $uppercase = preg_match('@[A-Z]@', $value); // şifre A-Z arasındaki karakterleri içeriyor mu
            $lowercase = preg_match('@[a-z]@', $value); // şifre a-z arasındaki karakterleri içeriyor mu
            $number = preg_match('@[0-9]@', $value);// şifre 0-9 arasında karakterleri içeriyor mu
            $specialChars = preg_match('@[^\w]@', $value);// şifre özel karakterler setini içeriyor mu . * ? gibi mu
            $whiteSpace=preg_match('@[ ]@',$value); // şifre boşluk içeriyor mu 

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($value)<8 || $whiteSpace) {
                return false;
            }
            return true;
        }

        public static function Message() {
            
        }
    }

?>