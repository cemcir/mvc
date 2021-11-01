<?php
    class MySqlAboutModel extends MysqlEntityModelBase implements IAboutModel {

        public function __construct($unitOfWork) {
            parent::__construct($unitOfWork);
        }
    }

?>