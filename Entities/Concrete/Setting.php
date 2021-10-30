<?php
    class Setting extends Entity {
    
        public function __construct() {
            $this->Table="settings";
            $this->Id="settings_id";
        }
    }
?>