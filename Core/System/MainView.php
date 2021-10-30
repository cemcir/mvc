<?php
    class View {
        public static function frontView($module,$method,$data=null,$return=false) {
            if($return==false) {
                if($file=DIRECTORY."/moduls/{$module}/view/{$method}View.php") {
                    require_once($file);
                }
                else {
                    echo "404 sayfa bulunamadı";
                }
            }
            else {
                ob_start();
                $file=DIRECTORY . "/moduls/{$module}/view/{$method}View.php";
                if(file_exists($file)) {
                    require_once $file;
                    $text=ob_get_contents();
                    ob_end_clean();
                    return $text;
                }
                else {
                    echo "404 Sayfa Bulunamadı !";
                }
            }
        }

        public static function frontLayout($area,$layout,$module,$method,$data=null) {
            $data['VIEW']=$method !=null ? View::frontView($module,$method,$data,true) : null;
            
            require_once DIRECTORY."/layout/{$area}/{$layout}Layout.php";
        }
    }


?>
