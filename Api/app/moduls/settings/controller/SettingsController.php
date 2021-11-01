<?php
    class SettingsController extends MainController {
        private $settingService;

        public function __construct($db,$httpStatusCode) {
            $this->settingService=new SettingManager(new MySqlSettingModel(new UnitOfWork($db,new MySqlSettingDal($db))));
            $this->httpStatusCode=$httpStatusCode;
        }

        public function GetAll() {
            $this->result=$this->settingService->GetAll(['columns_name'=>'settings_id','columns_sort'=>'DESC','limit'=>'10']);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
            else {
                if($this->result->Message==Messages::$SettingNotFound) {
                    http_response_code($httpStatusCode['NotFound']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
            }
        }

        public function GetById($settingId) {
            $this->result=$this->settingService->GetById($settingId);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
            else {
                if($this->result->Message==Messages::$SettingNotFound) {
                    http_response_code($this->httpStatusCode['NotFound']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
            }
        }

        public function Add() {
            $this->data=$_POST;
            $options=['file_name'=>'settings_value','dir'=>'settings'];
            $this->result=$this->settingService->Add($this->data,$options);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['Created']);
                if(!empty($_FILES['settings_value']['name'])) {
                    $this->result->TmpName=$_FILES['settings_value']['tmp_name']; 
                    unset($this->result->DeleteFile);
                }
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
            else {
                if(!empty($this->result->arrMessage)) {
                    http_response_code($this->httpStatusCode['UnprocessableEntity']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
        }

        public function Update() {
            $this->data=$_POST;
            $file_delete=$this->data['delete_file'];
            unset($this->data['delete_file']);
            //$this->data = json_decode(file_get_contents("php://input"),true);
            $this->result=$this->settingService->Update($this->data,['file_name'=>'settings_value','file_delete'=>'delete_file']);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                if(!empty($_FILES['settings_value']['name'])) {
                    $this->result->TmpName=$_FILES['settings_value']['tmp_name'];
                    $this->result->DeleteFile=$file_delete;
                }
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
            else {
                if(!empty($result->arrMessage)) {
                    http_response_code($this->httpStatusCode['UnprocessableEntity']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
        }

        public function Delete() {
            $this->data=json_decode(file_get_contents("php://input"),true);
            $this->result=$this->settingService->Delete($this->data['settings_id']);
              
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                unset($this->result->TmpName,$this->result->EncryptionFile,$this->result->DeleteFile);
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
            else {
                if(!empty($this->result->arrMessage)) {
                    http_response_code($this->httpStatusCode['UnprocessableEntity']);
                }
                else if(!empty($this->result->Message) && $this->result->Message==Messages::$SettingNotFound) {
                    http_response_code($this->httpStatusCode['NotFound']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
                echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
            }
        }
    }

?>