<?php
    require_once('../../core/boot/bootbase.php');
    require_once('../app/boot.php');
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods:GET,POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    $app=new App($config,Db::GetInstance()->GetConnection(),$httpStatusCode);
    
?>
