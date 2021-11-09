<?php
    final class ContactValidator implements IValidator {
        
        public static function Validate(array $entity) {
            Validate::SetFields($entity);
            Validate::SetRules(
                [
                    'contacts_subject'=>['required','min:3','max:255'],
                    'contacts_message'=>['required','string'],
                    'contacts_email'=>['required','email','max:50'] 
                ]
            );
            return Validate::Make();
        }

    }
?>