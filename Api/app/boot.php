<?php
    require_once('library/CrudPDO.php');
    require_once(DIRECTORY.'/system/mainmodel.php');
    require_once(MAIN_DIRECTORY.'/dataaccess/concrete/mysql/database.php');
    require_once(MAIN_DIRECTORY.'/core/system/api/app.php');
    require_once('route.php');

    spl_autoload_register(function($class_name) {
        if(file_exists($inc=MAIN_DIRECTORY."/business/validationrules/abstract/{$class_name}.php")) {
            require_once($inc);
        }
        
        if(file_exists($inc=MAIN_DIRECTORY."/business/validationrules/concrete/{$class_name}.php")) {
            require_once($inc);
        }
    });
?>
