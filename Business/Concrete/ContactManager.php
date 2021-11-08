<?php
    class ContactManager implements IContactService {
        private $contactModel;
        
        public function __construct($contactModel) {
            $this->contactModel=$contactModel;
        }

        public function GetMessageByIndis($pageNumber,$indis):IDataResult{
            return $this->contactModel->GetByIndis($pageNumber,$indis,Messages::$MessageNotFound);
        }

    }
?>