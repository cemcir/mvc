<?php
    final class MbConvertCase {//bir string ifadenin başındaki,sonundaki ve ortasındaki boşlukları siler ve string 
        //ifadenin ilk harflerini büyük harfe dönüştürür
        public static function ConvertCase($entity=[],$options=[]) {// parametre olarak dizinin key değerlerini,dizinin kendisini gerçek
            // keyler ile karşılaştırılacak options değerler dizini alır
            if(count($options)==1) {//tek key değeri var mı kontrol et
                //mb_convert_case fonksiyonu ile ilk harfleri büyük yap bunu MB_CASTLE_TITLE sabiti ile yapar UTF-8 ise türkçe karakter sorununu ortadan kaldırmak içindir
                //trim fonksiyonu ile baştaki ve sondaki boşlukları sil
                //preg_replace fonksiyonu ile de string arasındaki çoklu boşlukları tek boşluk haline getir örnek php   kullanım  alanları=>php kullanım alanları olur
                $entity[$options[0]]=mb_convert_case(trim(preg_replace('/\s+/',' ',$entity[$options[0]])),MB_CASE_TITLE,"UTF-8");
            }
            else {
                foreach($options as $key) {
                    if(array_key_exists($key,$entity)) {
                        $entity[$key]=mb_convert_case(trim(preg_replace('/\s+/',' ',$entity[$key])),MB_CASE_TITLE,"UTF-8");
                    }
                }
            }
            return $entity;// geriye varlık dizisini dön
        } 
    }
?>