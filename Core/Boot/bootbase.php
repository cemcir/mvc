<?php
    require_once('../../core/config/config.php');
    require_once(MAIN_DIRECTORY.'/core/dataaccess/ientityrepository.php');
    require_once(MAIN_DIRECTORY.'/core/dataaccess/mysql/mysqlentityrepositorybase.php');
    require_once(MAIN_DIRECTORY.'/core/entities/entity.php');
    require_once(MAIN_DIRECTORY.'/core/model/ientitymodel.php');
    //require_once(MAIN_DIRECTORY.'/core/model/mysql/mysqlentitymodelbase.php');
    require_once(MAIN_DIRECTORY.'/core/utilities/business/businessrules.php');
    require_once(MAIN_DIRECTORY.'/core/utilities/trycatch/trycatch.php');
    require_once(MAIN_DIRECTORY.'/core/constants/constmessages.php');
    require_once(MAIN_DIRECTORY.'/core/dataaccess/iunitofwork.php');
    spl_autoload_register(function($class_name) {
        
        $modul=explode("Model",$class_name);
        if(file_exists($inc=DIRECTORY."/moduls/{$modul[0]}/model/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=DIRECTORY."/objects/{$class_name}.php")) {
            require_once($inc);
        }
        
        if(file_exists($inc=MAIN_DIRECTORY."/dataaccess/concrete/inmemory/{$class_name}.php")) {
            require_once($inc);
        }
        
        if(file_exists($inc=MAIN_DIRECTORY."/entities/concrete/{$class_name}.php")) {
            require_once($inc);
        }
        
        if(file_exists($inc=MAIN_DIRECTORY."/dataaccess/abstract/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/utilities/results/abstract/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/utilities/results/concrete/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/dataaccess/concrete/mysql/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/business/abstract/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/business/concrete/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/business/constants/{$class_name}.php")) {
            require_once($inc);
        }
        
        if(file_exists($inc=MAIN_DIRECTORY."/core/system/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/model/abstract/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/model/concrete/mysql/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/crosscuttingconcerns/validation/abstract/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/crosscuttingconcerns/validation/concrete/rules/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/utilities/stringoperations/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/crosscuttingconcerns/validation/concrete/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/utilities/fileoperations/{$class_name}.php")) {
            require_once($inc);
        }

        if(file_exists($inc=MAIN_DIRECTORY."/core/utilities/timeoperations/{$class_name}.php")) {
            require_once($inc);
        }
    });
?>
