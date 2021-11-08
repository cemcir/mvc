<?php
    class MySqlContactModel extends MysqlEntityModelBase implements IContactModel {
        
        public function __construct($unitOfWork) {
            parent::__construct($unitOfWork);
        }
        
    }
?>