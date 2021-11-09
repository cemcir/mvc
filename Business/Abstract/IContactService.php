<?php
    interface IContactService {
        public function Add($contact):IResult;
        public function GetMessageByIndis($pageNumber,$indis):IDataResult;
    }
?>