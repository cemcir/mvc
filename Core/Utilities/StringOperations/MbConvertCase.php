<?php
    final class MbConvertCase {//bir string ifadenin başındaki,sonundaki ve ortasındaki boşlukları siler ve string 
        //ifadenin ilk harflerini büyük harfe dönüştürür
        public static function ConvertCase($keys,$entity=[],$options=[]) {// parametre olarak dizinin key değerlerini,dizinin kendisini gerçek
            // keyler ile karşılaştırılacak options değerler dizini alır
            if(count($options)==1) {//tek key değeri var mı kontrol et
                //mb_convert_case fonksiyonu ile ilk harfleri büyük yap bunu MB_CASTLE_TITLE sabiti ile yapar UTF-8 ise türkçe karakter sorununu ortadan kaldırmak içindir
                //trim fonksiyonu ile baştaki ve sondaki boşlukları sil
                //preg_replace fonksiyonu ile de çoklu boşlukalrı tek boşluk haline getir örnek php   kullanım  alanları=>php kullanım alanları olur
                $entity[$options[0]]=mb_convert_case(trim(preg_replace('/\s+/',' ',$entity[$options[0]])),MB_CASE_TITLE,"UTF-8");
            }
            else {
                for($i=0; $i<count($options); $i++) {// programcının dolaşılmasını istediği keylerin döngüsü
                    for($j=0; $j<count($keys); $j++) {// dizinin gerçek keyleri
                        if($keys[$j]==$options[$i]) { 
                            $entity[$options[$i]]=mb_convert_case(trim(preg_replace('/\s+/',' ',$entity[$options[$i]])),MB_CASE_TITLE,"UTF-8");
                            break;
                        }
                    }
                }
            }
            return $entity;// geriye varlık dizisini dön
        } 
    }
?>