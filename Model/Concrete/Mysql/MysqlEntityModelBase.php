<?php
    class MySqlEntityModelBase implements IEntityModel {
        protected $unitOfWork;

        public function __construct($unitOfWork) {
            $this->unitOfWork=$unitOfWork;
        }
        
        public function GetAll($options,$entityNotFound):IDataResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->GetAll($options);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data);
                }
                return new ErrorDataResult($entityNotFound);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorDataResult($e->getMessage());
            }
        }

        public function Get($value,$entityNotFound):IDataResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->Get($value);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetch(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data);
                }
                return new ErrorDataResult($entityNotFound);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorDataResult($e->getMessage());
            }
        }

        public function Add($values,$entityAdded,$entityNotAdded):IResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->Add($values);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()) {
                    return new SuccessResult($entityAdded);
                }
                return new ErrorResult($entityNotAdded);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorResult($e->getMessage());
            }
        }

        public function Update($values,$entityUpdated):IResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->Update($values);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()) {
                    return new SuccessResult($entityUpdated);
                }
                return new SuccessResult($entityUpdated);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorResult($e->getMessage());
            }
        }

        public function Delete($value,$entityDeleted):IResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->Delete($value);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    return new SuccessResult($entityDeleted);
                }
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorResult($e->getMessage());
            }
        }

        public function GetByColumn($column,$value,$entityNotFound):IDataResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->GetByColumn($column,$value);
                $this->unitOfWork->Commit();
                if($stmt->rowCount()>0) {
                    $this->data=$stmt->fetch(PDO::FETCH_ASSOC);
                    return new SuccessDataResult($this->data);
                }
                return new ErrorDataResult($entityNotFound);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorDataResult($e->getMessage());
            }
        }
    }

?>