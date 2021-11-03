<?php
    class DefaultsController extends MainController {
        
        function __construct($db,$httpStatusCode) {
            $this->httpStatusCode=$httpStatusCode;
        }
        
        public function index() {
            echo json_encode("php mvc rest api",JSON_UNESCAPED_UNICODE);
        }
    }
?>