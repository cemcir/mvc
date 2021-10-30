<?php
    class Result implements IResult {
        public $Message;
        public $Success;
        

        public function __construct() {
            $arguments=func_get_args();
            $numberOfArguments=func_num_args();

            if(method_exists($this,$function='__construct'.$numberOfArguments)) {
                call_user_func_array(array($this,$function),$arguments);
            }
        }

        public function __construct1($success) {
            $this->Success=$success;
        }

        public function __construct2($success,$message) {
            $this->Message=$message;
            $this->Success=$success;
        }
    }
?>