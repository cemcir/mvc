<?php
    class MySqlBlogModel extends MysqlEntityModelBase implements IBlogModel {

        public function __construct($unitOfWork) {
            parent::__construct($unitOfWork);
        }

    }
?>