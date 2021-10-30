<?php
    interface IUnitOfWork {
        public function Commit():void;
        public function BeginTransaction():void;
        public function RollBack():void;
    }

?>