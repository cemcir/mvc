<?php
    class MySqlContactDal extends MySqlEntityRepositoryBase implements IContactDal {
        public function __construct($db) {
            parent::__construct($db,new Contact());
        }
    }
?>