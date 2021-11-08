<?php
    class SliderManager implements ISliderService {
        private $sliderModel;

        public function __construct($sliderModel) {
            $this->sliderModel=$sliderModel;
        }

        public function GetAll($options=[]) :IDataResult{
            return $this->sliderModel->GetAll($options,Messages::$SliderNotFound);
        }

        public function Add($slider,$options=[]):IResult {
            $validate=ValidationTool::Validate([SliderValidator::Validate($slider)]);
            if($validate!=null) {
                return $validate;
            }
            $slider=AddFileEntity::Add($slider,$options);
            $result=$this->sliderModel->Add($slider,Messages::$SliderAdded,Messages::$SliderNotAdded);
            if($result->Success) {
                $result->EncryptionFile=$slider['sliders_file'];
            }
            return $result;
        }

        public function Update($slider,$options=[]):IResult {
            $validate=ValidationTool::Validate([SliderValidator::Validate($slider)]);
            if($validate!=null) {
                return $validate;
            }
            $result=BusinessRules::Run([$this->CheckIfSliderExists($slider['sliders_id'])]);
            if($result!=null) {
                return $result;
            }
            $slider=AddFileEntity::Add($slider,$options);
            $slider=MbConvertCase::ConvertCase($slider,['sliders_title']);
            $result=$this->sliderModel->Update($slider,Messages::$SliderUpdated);
            if($result->Success) {
                $result->EncryptionFile=$slider[$options['file_name']];
            }
            return $result;
        }

        private function CheckIfSliderExists($id):IResult {
            $result=$this->sliderModel->Get($id,Messages::$SliderNotFound);
            if($result->Success==false) {
                return new ErrorResult($result->Message);
            }
            return new SuccessResult();
        }
    }
?>