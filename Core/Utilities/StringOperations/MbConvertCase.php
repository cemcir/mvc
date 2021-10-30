<?php
    final class MbConvertCase {
        public static function ConvertCase($keys,$entity=[],$options=[]) {
            if(count($options)==1) {
                $entity[$options[0]]=mb_convert_case(trim(preg_replace('/\s+/',' ',$entity[$options[0]])),MB_CASE_TITLE,"UTF-8");
            }
            else {
                for($i=0; $i<count($options); $i++) {
                    for($j=0; $j<count($keys); $j++) {
                        if($keys[$j]==$options[$i]) {
                            $entity[$options[$i]]=mb_convert_case(trim(preg_replace('/\s+/',' ',$entity[$options[$i]])),MB_CASE_TITLE,"UTF-8");
                            break;
                        }
                    }
                }
            }
            return $entity;
        } 
    }
?>