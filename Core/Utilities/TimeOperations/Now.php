<?php
    final class Now {

        public static function DateTime($entity=[],$options=[]):array {
            date_default_timezone_set('Europe/Istanbul');
            $entity=$entity+[$options['time']=>date('Y-m-d H:i:s')];
            return $entity;
        }

    }
?>