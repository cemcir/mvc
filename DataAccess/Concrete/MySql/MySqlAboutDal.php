<?php
    class MySqlAboutDal extends MySqlEntityRepositoryBase implements IAboutDal {
        public function __construct($db) {
            parent::__construct($db,new About());
        }
    }
?>