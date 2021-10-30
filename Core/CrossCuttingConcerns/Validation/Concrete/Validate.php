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
            'max'=>'Max'
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

        public static function SetFields(array $fields) {
            self::$fields=$fields;
            self::$allFields=$fields;
        }

        public static function Make() {
            
            $fails=[];
            $arr=[];
            $rules=['string','required','number','length','max'];
            
            foreach(self::$rules as $key=>$rule) {
                for($i=0; $i<count($rule); $i++) {
                    $result=strpos($rule[$i],':');
                    if($result) {
                        $arr=explode(':',$rule[$i]);
                        $getRuleClass=self::$ruleClass[$arr[0]];
                        if($arr[0]=="size" && !empty($_FILES[$key]['name'])) {
                            if(!$getRuleClass::Check($_FILES[$key]['size'],$arr[1])) {
                                $fails=$fails+[$key=>$getRuleClass::Message($arr[1])];
                                break;
                            }
                        }
                        if(in_array($arr[0],$rules) && array_key_exists($key,self::$fields)) {   
                            if(!$getRuleClass::Check(self::$fields[$key],$arr[1])) {
                                $fails=$fails+[$key=>$getRuleClass::Message($arr[1])];
                                break;
                            }   
                        }
                    }
                    else {
                        if(in_array("required",$rule)) {
                            if(in_array("image",$rule)) {
                                if(!Required::Check($_FILES[$key]['name'])) {
                                    $fails=$fails+[$key=>Required::Message()];
                                    break;
                                }
                            }
                            else {
                                if(!Required::Check(self::$fields[$key])) {
                                    $fails=$fails+[$key=>Required::Message()];
                                    break;
                                }
                            }
                        }
                        $getRuleClass=self::$ruleClass[$rule[$i]];
                        if(!empty($_FILES[$key]['name']) && $rule[$i]=="image") {
                            if(!$getRuleClass::Check($_FILES[$key]['name'])) {
                                $fails=$fails+[$key=>$getRuleClass::Message()];
                                break;
                            }
                        }
                        if(in_array($rule[$i],$rules) && array_key_exists($key,self::$fields)) {
                            if(!$getRuleClass::Check(self::$fields[$key])) {
                                $fails=$fails+[$key=>$getRuleClass::Message()];
                                break;
                            }   
                        }
                    }
                }
            }
            if(!empty($fails)) {
                $errorResult = new ErrorResult(null,$fails);
                unset($errorResult->Message);
                return $errorResult;
            }
            return new SuccessResult();
        }

        public static function GetAllFields() :array {
            return self::$allFields;
        }
    }
?>