<?php
    final class TryCatch {

        public static function Result($method):IResult {
            try {
                return $method;
            }
            catch(PDOException $e) {
                return new ErrorResult($e->getMessage());
            }
        }

        public static function DataResult($method):IDataResult {
            try {
                return $method;
            }
            catch(PDOException $e) {
                return new ErrorDataResult($e->getMessage());
            }
        }

    }
?>