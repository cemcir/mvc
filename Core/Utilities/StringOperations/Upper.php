<?php
    final class Upper {

        public static function ToUpper($keys=[],$entity=[],$options=[]) {
            for($i=0; $i<count($options); $i++) {
                for($j=0; $j<count($keys); $j++) {
                    if($keys[$j]==$options[$i]) {
                        $entity[$options[$i]]=mb_strtoupper(trim(preg_replace('/\s+/','',$entity[$options[$i]])));
                        break;
                    }
                }
            }
            return $entity;
        }

    }
?>