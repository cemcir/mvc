<?php
    final class AddFileEntity { //bu fonksiyon şifrelenmiş dosyayı ilgili verilen entity dizisine ekler 
        public static function Add($entity=[],$options=[]) :array {
            if(!empty($_FILES[$options['file_name']]['name'])) {// böyle bir dosya var mı diye kontrol et
                $name_y=EncryptionFile::Encryption($_FILES[$options['file_name']]['name']);//şifrelenmiş dosya ismini ilgili değişkene at 5cd473b3e0721.png gibi bir değer
                $entity=$entity+[$options['file_name']=>$name_y];//dizide olmayan ilgili key ve şifrelenmiş dosya değerini diziye ekle
            }
            return $entity; //varlık dizisini geriye dön
        }
    }

?>