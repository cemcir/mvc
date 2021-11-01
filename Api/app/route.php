<?php
    App::getAction('/','/');

    //Nedmin
    App::getAction('/nedmin','/nedmin/index',true,'backend');
    App::getAction('/nedmin/login','/nedmin/login');
    App::getAction('/nedmin/logout','/nedmin/logout');
    App::postAction('/nedmin/login','/nedmin/loginControl');
    
    
    App::getAction('/nedmin/settings','/nedmin/settings');
    App::getAction('/nedmin/settings/update/([0-9]+)','/nedmin/settingsUpdate'); //true
    App::postAction('/nedmin/settings/update/settingsUpdateOp','/nedmin/settingsUpdateOp'); //true
    
    //Settings
    App::getAction('/api/settings/getall','/settings/getall');
    App::getAction('/api/settings/getbyid/([0-9]+)','/settings/getbyid');
    App::postAction('/api/settings/add','/settings/add');
    App::postAction('/api/settings/delete','/settings/delete');
    App::postAction('/api/settings/update','/settings/update');
    
    //Blogs
    App::getAction('/api/blogs/getall','/blogs/getall');
    App::getAction('/api/blogs/getbyid/([0-9]+)','/blogs/getbyid');
    App::postAction('/api/blogs/add','/blogs/add');
    App::postAction('/api/blogs/update','/blogs/update');
    App::postAction('/api/blogs/delete','/blogs/delete');
    
    //Abouts
    App::getAction('/api/abouts/getbyslug/([a-z]+)','/abouts/getbyslug');
    /*
    App::getAction('/index','/default/index');
    App::getAction('/kullanici/([0-9a-zA-Z-_]+)','/default/users/([0-9a-zA-Z-_]+)');
    App::postAction('/form','/default/formpost');
    //App::getAction('/default/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)','/default/dashboard/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)');
    */


    //Nedmin
    //App::getAction('/nedmin','/nedmin/index',true,'backend');
    //App::getAction('/nedmin/login','/nedmin/login');
    //App::getAction('/nedmin/logout','/nedmin/logout');
    //App::postAction('/nedmin/login','/nedmin/loginControl');

    //Settings
    //App::getAction('/nedmin/settings','/nedmin/settings',true,'backend');
    //App::getAction('/nedmin/settings','/nedmin/settings');
    //App::getAction('/nedmin/settings/update/([0-9]+)','/nedmin/settingsUpdate',true,'backend');
    //App::getAction("/default/([0-9]+)",'/default/dashboard');
?>
