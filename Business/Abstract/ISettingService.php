<?php
    interface ISettingService {
        public function GetAll($options):IDataResult;
        public function GetById($settingId):IDataResult;
        public function Add($setting,$options=[]):IResult;
        public function Update($setting,$options=[]):IResult;
        public function Delete($settingId):IResult; 
    }
?>