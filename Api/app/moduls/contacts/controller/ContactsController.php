<?php
    class ContactsController extends MainController {
        private $contactService;

        public function __construct($db,$httpStatusCode) {
            $this->contactService=new ContactManager(new MySqlContactModel(new UnitOfWork($db,new MySqlContactDal($db))));
            $this->httpStatusCode=$httpStatusCode;
        }

        public function GetMessage($pageNumber,$indis) {
            $this->result=$this->contactService->GetMessageByIndis($pageNumber,$indis);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
            }
            else {
                if($this->result->Message==Messages::$MessageNotFound) {
                    http_response_code($this->httpStatusCode['NotFound']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        public function Add() {
            $this->data=json_decode(file_get_contents("php://input"),true);
            $this->result=$this->contactService->Add($this->data);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
            }
            else {
                if(!empty($this->result->arrMessage)) {
                    http_response_code($this->httpStatusCode['UnprocessableEntity']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
    }
?>