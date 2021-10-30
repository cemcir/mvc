<?php
    final class MoveUploadedFile {
        public static function Move($tmp_name,$name_y,$options) {
            $dir=$options['dir'];
            if(!empty($_FILES[$options['file_name']]['name'])) {
                if (!@move_uploaded_file($tmp_name,getcwd()."/images/$dir/$name_y")) {
                    throw new Exception('Dosya yükleme hatası...');
                    if(file_exists('../../model')) {
                        throw new Exception('Dosya mevcut');
                    }
                }
            }
        }
    }
?>