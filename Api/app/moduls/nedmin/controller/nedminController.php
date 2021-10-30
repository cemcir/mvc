<?php
    class nedminController {
        private $settings;

        function __construct($message) {
            $this->settings=new Settings();
        }
        
        /*
        public function loginControl() {
            $loginControlModel=new nedminModel();
            $this->data=$loginControlModel->loginControl();
            if($this->data['status']) {
                header("Location:/nedmin");
                exit;
            }
            else {
                //$this->callView('nedmin','login',$this->data);
            }
        }

        public function logout() {
            $logoutModel=new nedminModel();
            $logoutModel->logout();
            $this->callView('nedmin','login',$this->data);
        }
        */
        public function settings() { 
            $settigsModel=new nedminModel(new Settings());
            $this->data=$settigsModel->settings($this->settings->table_name);
            http_response_code($this->data['statusCode']);
            if($this->data['status']) {
                echo json_encode($this->data['result'],JSON_UNESCAPED_UNICODE);
            }
            else {
                echo json_encode($this->data,JSON_UNESCAPED_UNICODE);
            }
        }
        
        public function settingsUpdate($settings_id) {
            $settingsUpdateModel=new nedminModel(new Settings());
            $this->data=$settingsUpdateModel->settingsUpdate(
                $this->settings->table_name,
                $settings_id
            );
            http_response_code($this->data['statusCode']);
            if($this->data['status']) {
                echo json_encode($this->data['result'],JSON_UNESCAPED_UNICODE);
            }
            else {
                echo json_encode($this->data['message'],JSON_UNESCAPED_UNICODE);
            }
        }

        public function settingsUpdateOp() {
            $data = json_decode(file_get_contents("php://input"),true);
            $settingsUpdateOpModel=new nedminModel(new Settings());
            $settingsUpdateOpModel->settingsUpdateOp($this->settings->table_name,$data);
            print_r($data);
        }
    }
?>