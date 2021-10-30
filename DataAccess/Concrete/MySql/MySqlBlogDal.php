<?php
    class MySqlBlogDal extends MySqlEntityRepositoryBase implements IBlogDal {
        
        public function __construct($db) {
            parent::__construct($db,new Blog());
        }

    }
?>