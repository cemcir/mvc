<?php
    class MySqlSettingModel extends MysqlEntityModelBase implements ISettingModel {

        public function __construct($unitOfWork) {
            parent::__construct($unitOfWork);
        }
        
    }
?>