<?php
    class BlogsController extends MainController {
        private $blogService;

        public function __construct($db,$httpStatusCode) {
            $this->blogService=new BlogManager(new MySqlBlogModel(new UnitOfWork($db,new MySqlBlogDal($db))));
            $this->httpStatusCode=$httpStatusCode;
        }
        
        public function GetAll() {
            $this->result=$this->blogService->GetAll(['columns_name'=>'blogs_id','columns_sort'=>'DESC','limit'=>'3']);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                echo json_encode($this->result->Data,JSON_UNESCAPED_UNICODE);
            }
            else {
                if($this->result->Message==Messages::$BlogNotFound) {
                    http_response_code($httpStatusCode['NotFound']);
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                    echo json_encode($this->result);
                }
            }
        }

        public function GetById($blogId) { 
            $this->result=$this->blogService->GetById($blogId);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                echo json_encode($this->result->Data,JSON_UNESCAPED_UNICODE);
            }
            else {
                if($this->result->Message==Messages::$BlogNotFound) {
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
            $options=['file_name'=>'blogs_file','time'=>'blogs_time','title'=>'blogs_title','slug'=>'blogs_slug'];
            $this->result=$this->blogService->Add($this->data,$options);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['Created']);
                if(!empty($_FILES['blogs_file']['name'])) {
                    $this->result->TmpName=$_FILES['blogs_file']['tmp_name']; 
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
            $this->result=$this->blogService->Update($this->data,['file_name'=>'blogs_file','time'=>'blogs_time','slug'=>'blogs_slug','title'=>'blogs_title']);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                if(!empty($_FILES['blogs_file']['name'])) {
                    $this->result->TmpName=$_FILES['blogs_file']['tmp_name'];
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
    }
?>