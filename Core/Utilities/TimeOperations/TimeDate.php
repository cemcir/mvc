<?php
    final class TimeDate {

        public static function TDate($date,$options=[]):string {
            $arg=explode(' ',$date);
            $date=explode('-',$arg[0]);
            $time=$arg[1];

            if($options['date']) { 
                return $date[2].'-'.$date[1].'-'.$date[0];
            }
            else if($options['time']) {
                return $time;
            }
            else if($options['date_time']) {
                return $date[2].'-'.$date[1].'-'.$date[0].' '.$time;
            }
        }

    }
?>