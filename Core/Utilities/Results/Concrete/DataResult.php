<?php
    class DataResult extends Result implements IDataResult {
        public $Data;

        public function __construct($success,$data,$message=null) {
            parent::__construct2($success,$message);
            $this->Data=$data;
        } 
    }
?>