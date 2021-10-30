<?php
    class mainModel extends CrudPDO {
        protected $db;
        protected $object;

        public function __construct($object) {
            $this->db=new CrudPDO();
            $this->object=$object;
        }
    }
?>
