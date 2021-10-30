<?php
    final class BlogValidator implements IValidator{
        
        public static function Validate(array $entity) {
            Validate::SetFields($entity);
            Validate::SetRules(
                [
                    'blogs_title'=>['required','length:3','max:255'],
                    'blogs_content'=>['required'],
                    'blogs_slug'=>['max:255'],
                    'blogs_file'=>['required','image','size:1024']
                ]
            );
            return Validate::Make();
        }

    }


?>