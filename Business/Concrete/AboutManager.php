<?php
    class AboutManager implements IAboutService {
        private $aboutModel;

        public function __construct($aboutModel) {
            $this->aboutModel=$aboutModel;
        }

        public function GetBySlug($slug):IDataResult {
            return $this->aboutModel->GetByColumn('abouts_slug',$slug,Messages::$AboutNotFound);
        }

        public function Update($about):IResult {
            $validate=ValidationTool::Validate([AboutValidator::Validate($about)]);
            if($validate!=null) {
                return $validate;
            }
            $result=BusinessRules::Run([$this->CheckIfAboutExist($about['abouts_id'])]);
            if($result!=null) {
                return $result;
            }
            return $this->aboutModel->Update($about,Messages::$AboutUpdated);
        }

        private function CheckIfAboutExist($id) {
            $result=$this->aboutModel->Get($id,Messages::$AboutNotFound);
            if($result->Success==false) {
                $errorResult=new ErrorResult($result->Message);
                //unset($errorResult->arrMessage);
                return $errorResult;
            }
            return new SuccessResult();
        }
    }
?>