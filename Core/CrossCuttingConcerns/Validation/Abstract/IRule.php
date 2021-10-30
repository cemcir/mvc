<?php
    interface IRule extends IMessage {
        public static function Check($value);
    }
?>