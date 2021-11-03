<?php
    final class ValidationTool {

        public static function Validate($methods=[]) { //doğrulama metodunu alır [AboutValidator::Validate()] gibi
        
            foreach($methods as $method) { //gönderilen metodları tek tek gez
                if($method->Success==false) {// method sonucu hatalı mı kontrol et
                    return $method; // hatalıysa ilgili hata objesini dön örneğin ErrorResult(Success=false,Message=null,arrMessage=['abouts_content'=>'Bu alan boş geçilemez']) gibi
                }
            }
            return null;
        } 
    }
?>