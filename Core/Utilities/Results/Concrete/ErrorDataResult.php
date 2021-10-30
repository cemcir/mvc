<?php
    class ErrorDataResult extends DataResult {

        public function __construct($message,$data=null) { 
            parent::__construct(false,$data,$message);
        }

    }
?>