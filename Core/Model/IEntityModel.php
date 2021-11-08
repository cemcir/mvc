<?php
    interface IEntityModel { //Her varitabanı tablosu için kullanılan ortak model metodlarının interface sınıfı
        public function GetAll($options,$entityNotFound):IDataResult;
        public function Get($value,$entityNotFound):IDataResult;
        public function Add($values,$entityAdded,$entityNotAdded):IResult;
        public function Update($values,$entityUpdated):IResult;
        public function Delete($value,$entityDeleted):IResult;
        public function GetByColumn($column,$value,$entityNotFound):IDataResult;
        public function GetByIndis($pageNumber,$indis,$entityNotFound):IDataResult;
    }
?>