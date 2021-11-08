<?php
    class MySqlEntityModelBase implements IEntityModel {
        protected $unitOfWork;

        public function __construct($unitOfWork) {// bağımlı enjeksiyon yap 
            $this->unitOfWork=$unitOfWork;
        }
        
        public function GetAll($options,$entityNotFound):IDataResult { // options değeri ilgili sorgu için kıstaslar dizisi örnek ['colums_name'=>'settings_must','columns_sort'=>'ASC'] gibi
            // $entityNotFound ise artık hangi modeli extends ederse bu modeli ona ait ilgili bulunamadı mesajı o mesajları ise business katmanındaki Constants sabit klasörü altındaki Messages sınıfından alacak 
            try {
                $this->unitOfWork->BeginTransaction();// UnitOfWork pattern yardımıyla transaction ı başlat
                $stmt=$this->unitOfWork->dal->GetAll($options);// ilgili options sorgu kıstasıyla tablodaki tüm veriler alınacak options=[] olursa tabloyu olduğu gibi listeleyecek
                $this->unitOfWork->Commit();// transaction ı commit et
                if($stmt->rowCount()>0) {// tablodan birden fazla satır geldi mi kontrol et
                    $this->data=$stmt->fetchAll();// tablodaki tüm satırları al
                    return new SuccessDataResult($this->data); // başarılı veri objesi dön Success=true ,Data=ilgili tablodan dönen verilerin listesi
                }
                return new ErrorDataResult($entityNotFound);// başarısız veri objesi dön Success=false ,Data=null ,ve Message=ilgili tablo için hata mesajı
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();// işlem başarısızsa transaction yardımıyla yapılan işlemi geri al
                return new ErrorDataResult($e->getMessage());//başarısız veri objesi yardımıyla genel ata mesajını dön
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
                    $this->data=$stmt->fetch(PDO::FETCH_ASSOC);//tablodaki tek satırı al
                    return new SuccessDataResult($this->data);
                }
                return new ErrorDataResult($entityNotFound);
            }
            catch(PDOException $e) {
                $this->unitOfWork->RollBack();
                return new ErrorDataResult($e->getMessage());
            }
        }

        public function GetByIndis($pageNumber,$indis,$entityNotFound):IDataResult {
            try {
                $this->unitOfWork->BeginTransaction();
                $stmt=$this->unitOfWork->dal->GetByIndis($pageNumber,$indis);
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
    }

?>