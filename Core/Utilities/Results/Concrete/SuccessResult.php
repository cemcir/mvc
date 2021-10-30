<?php
    class SuccessResult extends Result {
        public $TmpName=null;
        public $EncryptionFile=null;
        public $DeleteFile=null;

        public function __construct($message=null) {
            parent::__construct2(true,$message);
        }
        
    }
?>