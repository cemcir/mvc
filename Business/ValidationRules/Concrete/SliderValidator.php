<?php
    final class SliderValidator implements IValidator {
        public static function Validate(array $entity) {
            Validate::SetFields($entity);
            Validate::SetRules(
                [
                    'sliders_title'=>['required','length:3','max:255'],
                    'sliders_file'=>['required','image','size:1024']
                ]
            );
            return Validate::Make();
        }
    }
?>