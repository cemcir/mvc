<?php
    final class Name implements IRule {
        public function Check($value) {
            $pattern="/^([a-zA-ZÇŞĞÜÖİçşğüöiı ]+)$/"; // uyulması gerekilen ilgili regex ifadesi
            if(!preg_match($pattern,$value)) { // verilen değerin ilgili regex ifadelerinden oluşup oluşmadığını kontrol eder 
                return false;
            }
            return true;
        }

        public function Message() {
            return ConstMessages::$Name;
        }
    }
?>