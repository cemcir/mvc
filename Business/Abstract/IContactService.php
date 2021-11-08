<?php
    interface IContactService {
        public function GetMessageByIndis($pageNumber,$indis):IDataResult;
    }
?>