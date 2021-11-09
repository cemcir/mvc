<?php 
    interface IEntityRepository {
        public function GetAll($options = []);
        public function Get($value);
        public function Add($values);
        public function Update($values);
        public function Delete($value);
        public function QSql($sql);
        public function GetByColumn($column,$value);
        public function GetMaxId();
        public function GetMinId();
        public function GetByIndis($pageNumber,$indis);
        public function GetRecordNumber();
    }
?>