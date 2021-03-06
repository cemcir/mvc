<?php
    class BlogManager implements IBlogService {
        private $blogModel;

        public function __construct($blogModel) {
            $this->blogModel=$blogModel;
        }

        public function GetAll($options):IDataResult { //ilgili sql tablo kıstalarını dizi şeklide parametre olarak al
            return $this->blogModel->GetAll($options,Messages::$BlogNotFound);
        }

        public function GetById($blogId):IDataResult {
            return $this->blogModel->Get($blogId,Messages::$BlogNotFound);
        }

        public function Add($blog,$options=[]):IResult {
            $validate=ValidationTool::Validate([BlogValidator::Validate($blog)]);
            if($validate!=null) {
                return $validate;
            }
            $blog=$this->BlogStringOperations($blog,$options);
            $result = $this->blogModel->Add($blog,Messages::$BlogAdded,Messages::$BlogNotAdded);
            if($result->Success && !empty($_FILES['blogs_file']['name'])) {
                $result->EncryptionFile=$blog[$options['file_name']];
            }
            return $result;
        }

        public function Update($blog,$options=[]):IResult {
            $result=BusinessRules::Run([$this->CheckIfBlogExist($blog['blogs_id'])]);
            if($result!=null) {
                return $result;
            }
            $validate=ValidationTool::Validate([BlogValidator::Validate($blog)]);
            if($validate!=null) {
                return $validate;
            }
            $blog=$this->BlogStringOperations($blog,$options);
            $result=$this->blogModel->Update($blog,Messages::$BlogUpdated);
            if($result->Success && !empty($_FILES['blogs_file']['name'])) {
                $result->EncryptionFile=$blog[$options['file_name']];
            }
            return $result;
        }

        public function Delete($blogId):IResult {
            if(!Number::Check($blogId)) {
                return new ErrorResult(null,['blogs_id'=>Number::Message()]);
            }
            $result=BusinessRules::Run([$this->CheckIfBlogExist($blogId)]);
            if($result!=null) {
                return $result;
            }
            return $this->blogModel->Delete($blogId,Messages::$BlogDeleted);
        }

        private function CheckIfBlogExist($id) {
            $result=$this->blogModel->Get($id,Messages::$BlogNotFound);
            if($result->Success==false) {
                return new ErrorResult($result->Message);    
            }
            return new SuccessResult();
        }

        private function BlogStringOperations($blog=[],$options=[]):array {
            $blog=MbConvertCase::ConvertCase($blog,['blogs_title']);
            $blog=AddFileEntity::Add($blog,$options);
            $blog=Slug::SlugFunc($blog,$options);
            $blog=Now::DateTime($blog,$options);
            return $blog;
        }
    }
?>