<?php
    final class Slug {
        public static function SlugFunc($entity=[],$options=[]) {
            if(isset($options['slug'])) {
                if(empty($entity[$options['slug']])) {
                    $entity[$options['slug']]=Seo::SeoFunc($entity[$options['title']]);
                }
                else {
                    $entity[$options['slug']]=Seo::SeoFunc($entity[$options['slug']]);                        
                }
            }
            return $entity;
        }
    }

?>