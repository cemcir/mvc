<?php
    class SliderManager implements ISliderService {
        private $sliderModel;

        public function __construct($sliderModel) {
            $this->sliderModel=$sliderModel;
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
    }
?>