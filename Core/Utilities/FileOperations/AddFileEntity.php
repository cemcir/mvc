<?php
    final class AddFileEntity {
        public static function Add($entity=[],$options=[]) :array {
            if(!empty($_FILES[$options['file_name']]['name'])) {
                $name_y=EncryptionFile::Encryption($_FILES[$options['file_name']]['name']);
                $entity=$entity+[$options['file_name']=>$name_y];
            }
            return $entity;
        }
    }

?>