<?php
    class Controller extends MainController {

        public function callView($module,$method,$params=[]) {
            return View::frontView($module,$method,$params);
        }

        public function callLayout($area,$layout,$module,$method,$params=[]) {
            return View::frontLayout($area,$layout,$module,$method,$params);
        }
        
    }
?>