<?php
    final class EncryptionFile {
        public static function Encryption($name) :string {
            $ext = strtolower(substr($name, strpos($name, '.') + 1));
            return uniqid(). "." .$ext;
        }
    }
?>