<?php 
    class MySqlSettingDal extends MySqlEntityRepositoryBase implements ISettingDal {
        
        public function __construct($db) {
            parent::__construct($db,new Setting());
        }

        //Tabloya özgü sorgular burada yazılacak
    }
?>