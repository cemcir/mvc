<?php
    /*
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
   */
    class defaultController extends MainController {
        
        function __construct($db,$httpStatusCode) {
            $this->httpStatusCode=$httpStatusCode;
        }
        
        public function index() {
            //$indexModel=new defaultModel(new Settings());
            //$this->data=$indexModel->index();
           // $this->callLayout("frontend","main","default","index",$this->data);
            echo json_encode("merhaba dünya",JSON_UNESCAPED_UNICODE);
        }
        
        public function login() {
            //$this->callLayout("backend","main","default","login",$this->data);
        }

        public function dashboard($a) {
            $settigsModel=new nedminModel();
            $this->data=$settigsModel->settings('settings');
            http_response_code($this->data['statusCode']);
            if($this->data['status']) {
                echo json_encode($this->data,JSON_UNESCAPED_UNICODE);
            }
            else {
                echo json_encode(['message'=>$this->data['message']],JSON_UNESCAPED_UNICODE);
            }
        }
    }
?>