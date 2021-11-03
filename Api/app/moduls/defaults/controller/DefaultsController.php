<?php
    /*
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
   */
    class DefaultsController extends MainController {
        
        function __construct($db,$httpStatusCode) {
            $this->httpStatusCode=$httpStatusCode;
        }
        
        public function index() {
            echo json_encode("php mvc rest api",JSON_UNESCAPED_UNICODE);
        }
    }
?>