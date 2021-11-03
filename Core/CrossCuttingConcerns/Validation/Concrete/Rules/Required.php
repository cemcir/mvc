<?php
    final class Required implements IRule {

        public static function Check($value) {
            if(empty($value) && is_numeric($value)) { // 0 sayısının gelebileceği durumlarda bu doğrulamayı esas al
                return true;
            }
            else if(empty($value)) { // değerin boş olup olmadığını kontrol et
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$Required; // ilgili sabit mesajı dön
        }
    }
?>