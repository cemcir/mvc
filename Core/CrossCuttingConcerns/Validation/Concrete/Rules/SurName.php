<?php
    final class SurName implements IRule {

        public static function Check($value) {
            $pattern="/^([a-zA-ZÇŞĞÜÖİçşğüöiı]+)$/"; //soyisim ifadesi için ilgili regex ifadesi
            if(!preg_match($pattern,$value)) {// girilen soyisim verilen regex ifadesindeki değerlere uyuyor mu kontrol et
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Invalid;
        }
    }
?>