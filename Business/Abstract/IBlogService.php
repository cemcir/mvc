<?php
    interface IBlogService {
        public function GetAll($options):IDataResult;
        public function GetById($blogId):IDataResult;
        public function Add($blog,$options=[]):IResult;
        public function Update($blog,$options=[]):IResult;
        public function Delete($blogId):IResult;
    }
?>