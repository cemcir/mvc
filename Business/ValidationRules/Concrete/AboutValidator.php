<?php
     final class AboutValidator implements IValidator {
        
        public static function Validate(array $entity) {
            Validate::SetFields($entity);// tabloya ait ilgili alanları gir
            Validate::SetRules(// ilgili key lere ait değerler için kurallar belirler
                [
                    'abouts_content'=>['required','string'] // burası zorunlu olmalı
                ]
            );
            return Validate::Make();// verilen doğrulama kurallarını sırasıyla denetler örnek ['abouts_content'=>['required','string']]
            // öncelikle değer var mı diye bakar daha sonra string mi diye kontrol eder sırasıyla yapar 
        }
    }
?>