<?php
    class SettingManager implements ISettingService {
        private $settingModel;

        public function __construct($settingModel) {
            $this->settingModel=$settingModel;
        }

        public function GetAll($options):IDataResult {
            return $this->settingModel->GetAll($options,Messages::$SettingNotFound); 
        }

        public function GetById($settingId):IDataResult {
            return $this->settingModel->Get($settingId,Messages::$SettingNotFound);
        }

        public function Add($setting,$options=[]):IResult {
            $validate=ValidationTool::Validate([SettingValidator::Validate($setting)]);
            if($validate!=null) {
                return $validate;
            }
            $setting=AddFileEntity::Add($setting,$options);// şifrelenmiş dosyayı entity dizisine dahil eder
            //$setting=Trim::TrimFunc(array_keys($setting),$setting,['settings_value']);
            $result = $this->settingModel->Add($setting,Messages::$SettingAdded,Messages::$SettingNotAdded);
            if($result->Success && !empty($_FILES['settings_value']['name'])) {
                //MoveUploadedFile::Move($_FILES['settings_value']['tmp_name'],$setting['settings_value'],$options);
                $result->EncryptionFile=$setting[$options['file_name']];
            }
            return $result;
        }

        public function Update($setting,$options=[]):IResult {
            $validate=ValidationTool::Validate([SettingValidator::Validate($setting)]);
            if($validate!=null) {
                return $validate;
            }
            $result=BusinessRules::Run([$this->CheckIfSettingExists($setting['settings_id'])]);
            if($result!=null) {
                return $result;
            }
            $setting=AddFileEntity::Add($setting,$options);
            $result=$this->settingModel->Update($setting,Messages::$SettingUpdated);
            if($result->Success && !empty($_FILES['settings_value']['name'])) {
                $result->EncryptionFile=$setting[$options['file_name']];
            }
            return $result;
        }

        public function Delete($settingId):IResult {
            $result=BusinessRules::Run([$this->CheckIfSettingExists($settingId)]);
            if($result!=null) {
                return $result;
            }
            return $this->settingModel->Delete($settingId,Messages::$SettingDeleted);
        }
        
        private function CheckIfSettingExists($id):IResult {
            $result=$this->settingModel->Get($id,Messages::$SettingNotFound);
            if($result->Success==false) {
                return new ErrorResult(Messages::$SettingNotFound);
            }
            return new SuccessResult();
        }
        
    } 
?>