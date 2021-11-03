<?php
    final class Image implements IRule {
        //image için izin verilen ilgili uzantılar
        private static $allowExtensions=['jpg','jpge','jpeg','png','bmp','ico','gif','svg','webp'];

        public static function Check($value) {
            //örnegin value=enes.png değerini alır strpos("enes.png",'.') kodu 5 değerini döner 5+1=6 olur
            //substr('enes.png',6) olduğunda 6. konumdan itibaren olan string ifadeyi alır oda png olur
            //strtolower("png") ise png olarak çıkar dosyanın uzantısı ext değişkenine atılır
            $ext = strtolower(substr($value, strpos($value, '.') + 1)); 
            if(in_array($ext,self::$allowExtensions)==false) { // dosya uzantısı ilgi dizi de varmı kontrol et
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$ImageExtensions; 
        }
    }

?>