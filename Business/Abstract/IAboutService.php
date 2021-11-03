<?php
    interface IAboutService {
        public function Update($about):IResult;
        public function GetBySlug($slug):IDataResult;
    }
?>