<?php
    final class UserName implements IRule {

        public static function Check($value) {
            $pattern="/^([a-zA-Z0-9]{6,30})$/";// kullanıcı adı için ilgili regex ifadesi minimum 6 maksimum 30 karakter olabilir
            if(!preg_match($pattern,$value) || $value[0]=="0") { // regex girilen değere uygun mu veya ilk karakter 0 mı kontrol et
                return false;
            }              
            return true;
        }

        public static function Message() {

        }
    }
?>