<?php
     class AboutsController extends MainController {
        private $aboutService;

        public function __construct($db,$httpStatusCode) {
            $this->aboutService=new AboutManager(new MySqlAboutModel(new UnitOfWork($db,new MySqlAboutDal($db))));
            $this->httpStatusCode=$httpStatusCode;
        }

        public function GetBySlug($slug) {
            $this->result=$this->aboutService->GetBySlug($slug);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                echo json_encode($this->result->Data,JSON_UNESCAPED_UNICODE);
            }
            else {
                if($this->result->Message==Messages::$AboutNotFound) {
                    http_response_code($this->httpStatusCode['NotFound']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }
?>