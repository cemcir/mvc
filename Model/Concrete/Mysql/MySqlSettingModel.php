<?php
    class MySqlSettingModel extends MysqlEntityModelBase implements ISettingModel {

        public function __construct($unitOfWork) {
            parent::__construct($unitOfWork);
        }
        /*
        public function __construct($unitOfWork) {
            $this->unitOfWork=$unitOfWork;
        }

        public function GetAll($options):IDataResult {
            try{
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->settingDal->GetAll($options);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data,Messages::$SettingsListed);
                }
                return new ErrorDataResult(Messages::$SettingNotFound);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorDataResult($e->getMessage());
            }
        }

        public function Get($value):IDataResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->settingDal->Get($value);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetch(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data,Messages::$SettingGet);
                }
                return new ErrorDataResult(Messages::$SettingNotFound);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorDataResult($e->getMessage());
            }
        }

        public function Add($values):IResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->settingDal->Add($values);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()) {
                    return new SuccessResult(Messages::$SettingAdded);
                }
                return new ErrorResult(Messages::$SettingNotUpdated);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorResult($e->getMessage());
            }
        }

        public function Update($values):IResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->settingDal->Update($values);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()) {
                    return new SuccessResult(Messages::$SettingUpdated);
                }
                else {
                    return new ErrorResult(Messages::$SettingNotUpdated);
                }
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorResult($e->getMessage());
            }
        }

        public function Delete($value):IResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->settingDal->Delete($value);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    return new SuccessResult(Messages::$SettingDeleted);
                }
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorResult($e->getMessage());
            }
        }
        */
    }
?>