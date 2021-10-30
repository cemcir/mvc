<?php
    class MySqlEntityModelBase implements IEntityModel {
        
        protected $data=[];

        private $mysqlEntityRepositoryBase;

        public function __construct($mysqlEntityRepositoryBase) {
            $this->mysqlEntityRepositoryBase=$mysqlEntityRepositoryBase;
        }

        public function GetAll($options):IDataResult {
            try {
                $stmt=$this->mysqlEntityRepositoryBase->GetAll($options);
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data,Messages::$SettingsListed);
                }
                return new ErrorDataResult(Messages::$SettingNotFound);
            }   
            catch(PDOException $e) {
                return ErrorDataResult($e->getMessage());
            }
        }

        public function Get($value):IDataResult {
            try {
                $stmt=$this->mysqlEntityRepositoryBase->Get($value);
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetch(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data,Messages::$SettingGet);
                }
                return new ErrorDataResult(Messages::$SettingNotFound);
            }
            catch(PDOException $e) {
                return new ErrorDataResult($e->getMessage());
            }
        }

        public function Add($values):IResult {
            try {
                $stmt=$this->settingDal->Add($values);
                if($stmt->rowCount()) {
                    return new SuccessResult(Messages::$SettingAdded);
                }
            }
            catch(PDOException $e) {
                return new ErrorResult($e->getMessage());
            }
        }

        public function Update($values):IResult {
            try {
                $stmt=$this->mysqlEntityRepositoryBase->Update($values);
                if($stmt->rowCount()) {
                    return new SuccessResult(Messages::$SettingUpdated);
                }
                else {
                    return new ErrorResult(Messages::$SettingNotUpdated);
                }
            }
            catch(PDOException $e) {
                return new ErrorResult($e->getMessage());
            }
        }

        public function Delete($value):IResult {
            try {
                $stmt=$this->mysqlEntityRepositoryBase->Delete($value);
                if($stmt->rowCount()>0) {
                    return new SuccessResult(Messages::$SettingDeleted);
                }
            }
            catch(PDOException $e) {
                return new ErrorResult($e->getMessage());
            }
        } 
    }
?>