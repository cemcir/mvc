<?php
    final class Image implements IRule {
        private static $allowExtensions=['jpg','jpge','jpeg','png','bmp','ico','gif','svg','webp'];

        public static function Check($value) {
            $ext = strtolower(substr($value, strpos($value, '.') + 1));
            if(in_array($ext,self::$allowExtensions)==false) {
                return false;
            }
            return true;
        }

        public static function Message() {
            return ConstMessages::$ImageExtensions;
        }
    }

?>