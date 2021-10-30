<?php
    class ErrorResult extends Result {

        public $arrMessage=[];
        

        public function __construct($message=null,$arrMessage=[]) {
            parent::__construct2(false,$message);
            $this->arrMessage=$arrMessage;
        }
    }


?>