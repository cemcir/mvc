<?php
    final class TryCatch { // Burası unitofwork pattern içerine eklenecek sürekli try catch yazmamak için MySqlEntityModelBase de
        //henüz entegrasyonu yapılmadı
        public static function Result($method,$unitOfWork):IResult {
            try { 
                return $method;
            }
            catch(PDOException $e) {
                return new ErrorResult($e->getMessage());
            }
        }

        public static function DataResult($method,$unitOfWork):IDataResult {
            try {
                return $method;
            }
            catch(PDOException $e) {
                return new ErrorDataResult($e->getMessage());
            }
        }

    }
?>