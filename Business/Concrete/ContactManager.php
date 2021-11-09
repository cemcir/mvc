<?php
    class ContactManager implements IContactService {
        private $contactModel;
        
        public function __construct($contactModel) {
            $this->contactModel=$contactModel;
        }

        public function GetMessageByIndis($pageNumber,$indis):IDataResult{
            return $this->contactModel->GetByIndis($pageNumber,$indis,Messages::$MessageNotFound);
        }

        public function Add($contact):IResult {
            $validate=ValidationTool::Validate([ContactValidator::Validate($contact)]);
            if($validate!=null) {
                return $validate;
            }
            return $this->contactModel->Add($contact,Messages::$ContactAdded,Messages::$ContactNotAdded);
        }
    }
?>