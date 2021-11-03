<?php
    final class MoveUploadedFile {// bu kod parçası gelen dosyanın kendisini $tmp_name ile ilgili dosya path inin altına eklemeyi sağlar
        public static function Move($tmp_name,$name_y,$options) {//sırasıyla parametre olarak gönderilen dosyanın tmp_name ini şifrelenmiş değerini ve options değişkeni yardımıyla ilgili dosyanın key dizideki key bilgisini elde et 
            $dir=$options['dir'];// dosyanın hangi klasör altına altılacağı bilgisidir
            if(!empty($_FILES[$options['file_name']]['name'])) { //dosya mevcut mu kontrol et
                if (!@move_uploaded_file($tmp_name,getcwd()."/images/$dir/$name_y")) {// dosyayı tmp_name değeri ve bulunduğumuz path değerini alarak ilgili klasörün altına taşı 
                    throw new Exception('Dosya yükleme hatası...');// bir hata varsa exception fırlat
                    /*
                    if(file_exists('../../model')) { //burası deneme amaçlı yapıldı
                        throw new Exception('Dosya mevcut');
                    }
                    */
                }
            }
        }
    }
?>