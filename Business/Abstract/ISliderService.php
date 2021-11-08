<?php
    interface ISliderService {
        public function GetAll($options=[]):IDataResult;
        public function Add($slider,$options=[]):IResult;
        public function Update($slider,$options=[]):IResult;
    }
?>