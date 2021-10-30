<?php
    final class Size implements ISize { //parametre olarak kb cinsinden değer alır

        public static function Check($fileSize,$size) {
            $size=$size*1024;
            if($fileSize>$size) {
                return false;
            }
            return true;
        }

        public static function Message($size) {
            $size=$size/1024;
            return "Dosya {$size} MB tan büyük olamaz";
        }

    }
?>