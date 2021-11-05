<?php
    class MySqlSliderDal extends MySqlEntityRepositoryBase implements ISliderDal {
        
        public function __construct($db) {
            parent::__construct($db,new Slider());
        }

        //Tabloya özgü sorgular burada yazılacak örneğin join işlemi gibi
    }
?>