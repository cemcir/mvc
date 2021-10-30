<?php
    final class SlugSplit {

        public static function Split($slug) :int {
            $arr=explode('-',$slug);
            return $arr[0];
        }

    }
?>