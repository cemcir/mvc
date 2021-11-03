<?php
    final class Size implements ISize { // parametre olarak kb cinsinden değer alır

        public static function Check($fileSize,$size) { // $fileSize gelen dosyanın boyutu $size ise örneğin size:512 dersek buradaki kb cinsinden kabul ettiğimiz ilgili 512 değeridir 
            $size=$size*1024; // kb değerini bayt değerine çevir
            if($fileSize>$size) { // verilen dosyanın boyutu size:512 ifadesinden gelen 512 nin bayta çevrilmiş değerinden büyük mü kontrol et
                return false;
            }
            return true;
        }

        public static function Message($size) {
            $size=$size/1024; // size:512 de verilen 512 kb cinsinden değeri mb dönüştür  
            return "Dosya {$size} MB tan büyük olamaz";
        }

    }
?>