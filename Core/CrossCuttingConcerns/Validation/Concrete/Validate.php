<?php
    final class Validate {

        //ilgili doğrulama için kuralları tutar
        private static $rules=[];

        //doğrulamaya girecek olan alanları tutar
        private static $fields=[];

        //doğrulama dahil tüm alanları tutar
        private static $allFields=[];

        //doğrulama kuralları
        private static $ruleClass=[
            'required'=>'Required',
            'number'=>'Number',
            'length'=>'Length',
            'string'=>'IsString',
            'image'=>'Image',
            'size'=>'Size',
            'max'=>'Max',
            'name'=>'Name'
        ];

        //ilgili alanlara kural belirtmeyi sağlar
        public static function SetRules(array $rules) {
            foreach($rules as $key=>$value) {
                if(is_string($value)) {
                    $rules[$key]=explode('|',$value);
                }
                /*
                if(!is_array($rules[$key])) {
                    $rules[$key]=[$value];
                }
                */
            }
            self::$rules=$rules;
        }

        //ilgili alanları eklemeyi sağlar
        public static function SetFields(array $fields) {
            self::$fields=$fields;
            self::$allFields=$fields;
        }

        public static function Make() {
            
            $fails=[]; // doğrulama hatalarını atacağımız dizi
            $arr=[]; // eğer : işareti varsa explode ile parçala buraya at
            $rules=['string','required','number','length','max','']; //image ve size dışındaki doğrulama kurallarını bu diziye at in_array ile kolay kıyaslama yapmak için
            
            foreach(self::$rules as $key=>$rule) {
                for($i=0; $i<count($rule); $i++) {
                    $result=strpos($rule[$i],':');
                    if($result) {
                        $arr=explode(':',$rule[$i]);
                        $getRuleClass=self::$ruleClass[$arr[0]];
                        if($arr[0]=="size" && !empty($_FILES[$key]['name'])) { //dosya boş değilse kontrol et
                            if(!$getRuleClass::Check($_FILES[$key]['size'],$arr[1])) { //dosyanın boyutunu kıyasla parametreyi kb cinsinden alıyormuş gibi kabul et
                                $fails=$fails+[$key=>$getRuleClass::Message($arr[1])]; //ilgili key i al hata mesajını fails dizisine at örnek ['settings_value'=>'bu alan 1 MB tan büyük olamaz'] gibi
                                break;
                            }
                        }
                        if(in_array($arr[0],$rules) && array_key_exists($key,self::$fields)) {   //ilgili kural ilgili dizide varmı verilen key gerçek key ile uyumlumu kontrol et
                            if(!$getRuleClass::Check(self::$fields[$key],$arr[1])) {
                                $fails=$fails+[$key=>$getRuleClass::Message($arr[1])];
                                break;
                            }   
                        }
                    }
                    else {
                        if(in_array("required",$rule)) { //ilgili kurallarımızda required varmı kontrol et
                            if(in_array("image",$rule)) { // ilgili kural image mı kontrol et
                                if(!Required::Check($_FILES[$key]['name'])) { // dosya boşmu kontrol et
                                    $fails=$fails+[$key=>Required::Message()];// şayet boşsa bu alan boş bırakılamaz diye mesaj ver
                                    break;
                                }
                            }
                            else {
                                if(!Required::Check(self::$fields[$key])) { //image değilse alan dolu mu boş mu diye bak
                                    $fails=$fails+[$key=>Required::Message()]; // şayet boşsa bu alan boş olamaz diye mesaj ver örnek ['blogs_title'=>'bu alan boş olamaz'] gibi 
                                    break;
                                }
                            }
                        }
                        $getRuleClass=self::$ruleClass[$rule[$i]]; //ilgili kural sınıfını getRuleClass değişkenine at Required,Name,IsString gibi
                        if(!empty($_FILES[$key]['name']) && $rule[$i]=="image") { // kural image mı ve dosya mevcut mu diye kontrol et
                            if(!$getRuleClass::Check($_FILES[$key]['name'])) { // burası dosyanın uzantısını kontrol eder jpg,png,imp gibi
                                $fails=$fails+[$key=>$getRuleClass::Message()];// hata varsa dosyanın uzantısı jpg,png,imp olmalı diye mesaj ver
                                break;
                            }
                        }
                        if(in_array($rule[$i],$rules) && array_key_exists($key,self::$fields)) { // verilen kural var mı ve girilen doğrulama key i postman isteğinden gelen key ile uyumlu mu kontrol et
                            if(!$getRuleClass::Check(self::$fields[$key])) { // ilgili alanı al ve Number::Check(['blogs_id'=>1]) ile kontrol et Number temsili programcı hangi doğrulama kurallarını girdiyse onun sınıfını atayacak 
                                $fails=$fails+[$key=>$getRuleClass::Message()]; // hata mesajını ilgili key e ata
                                break;
                            }   
                        }
                    }
                }
            }
            if(!empty($fails)) { // fails boşmu kontrol et 
                $errorResult = new ErrorResult(null,$fails); // ilgili hataları ErrorResult sınıfının arrMessage dizisine at Message=null olduğunu belirt 
                unset($errorResult->Message);  // ilgili sınıf objesinden Message özelliğini(property) kaldırır
                return $errorResult;
            }
            return new SuccessResult(); // hatasız sonuc objesi dön Success=true Message=null gibi
        }

        public static function GetAllFields() :array { //entity ye ait tüm alanları dizi şeklinde geri dön
            return self::$allFields;
        }
    }
?>