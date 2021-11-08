<?php
    //Defaults
    App::getAction('/','/');

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
    App::postAction('/api/abouts/update','/abouts/update');
    
    //Sliders
    App::postAction('/api/sliders/add','/sliders/add');
    App::getAction('/api/sliders/getall','/sliders/getall');
    App::postAction('/api/sliders/update','/sliders/update');
    
    //Contacts
    App::getAction('/api/contacts/getmessage/([0-9]+)/([0-9]+)','/contacts/getmessage');

    /* Burası devre dışı
    App::getAction('/kullanici/([0-9a-zA-Z-_]+)','/default/users/([0-9a-zA-Z-_]+)');
    App::postAction('/form','/default/formpost');
    App::getAction('/default/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)','/default/dashboard/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)');
    */
?>
