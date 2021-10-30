<?php
    class UnitOfWork implements IUnitOfWork {

        private $db;
        //public $settingDal;
        public $dal;

        public function __construct($db,$dal) {
            $this->db=$db;
            //$this->settingDal=new MySqlSettingDal($db);
            $this->dal=$dal;
        }

        public function BeginTransaction() :void {
            $this->db->beginTransaction();
        }

        public function RollBack():void {
            $this->db->rollback();
        }

        public function Commit():void {
            $this->db->commit();
        }
    }
?>