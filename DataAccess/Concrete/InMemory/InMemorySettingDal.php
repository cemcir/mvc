<?php   
    class InMemorySettingDal implements ISettingDal {
        public $setting=[];

        function __construct() {
            $this->setting=[
                ["settings_id"=>"1","settings_description"=>"Site Başlığı"],
                ["settings_id"=>"2","settings_description"=>"Site Açıklama"],
                ["settings_id"=>"3","settings_description"=>"Site Logo"]
            ];
        }

        public function GetAll() {
            return $this->setting;  
        }

        public function Get() {
            
        }

        public function Add() {

        }

        public function Update() {

        }

        public function Delete() {

        }
    }

?>