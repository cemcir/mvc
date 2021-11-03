<?php
    final class SettingValidator implements IValidator {
        
        public static function Validate(array $entity) {
            Validate::SetFields($entity);
            Validate::SetRules(
                [
                    'settings_value'=>["required","image","size:1024"]
                ]
            );
            return Validate::Make();
        }
        
        
        
    }
?>