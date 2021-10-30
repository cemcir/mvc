<?php
    class SuccessDataResult extends DataResult {

        public function __construct($data,$message=null) { 
            parent::__construct(true,$data,$message);
        }
    }

?>