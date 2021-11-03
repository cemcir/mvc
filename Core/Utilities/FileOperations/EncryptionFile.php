<?php
    final class EncryptionFile {
        public static function Encryption($name) :string {
            $ext = strtolower(substr($name, strpos($name, '.') + 1)); //dosyanın uzantısını al explode fonksiyonu ile de yapabilirdik
            return uniqid(). "." .$ext; //uniqid() fonksiyonu ile 11 karakterlik bir string ifade oluştur ilgili dosya uzantısını ekle ve dön
        }
    }
?>