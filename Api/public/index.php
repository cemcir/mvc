<?php
    require_once('../../core/boot/bootbase.php');
    require_once('../app/boot.php');
    /*
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods:GET,POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    */
    $app=new App($config,Db::GetInstance()->GetConnection(),$httpStatusCode);
    $arr=[
        "settings_id"=>'1',
        "settings_description" => "enes.pdf",
        "settings_key" => "title",
        "settings_value" => "    ne yazılım cMS Yönetim Paneli   ",
        "settings_type" => "text",
        "settings_must" => 0,
        "settings_delete" => 0,
        "settings_status" => 1
    ];
    //$validate=ValidationTool::Validate([SettingValidator::Validate($arr)]);
    //print_r($validate);
    /*
    $blog=['blogs_title'=>'Blog 01','blogs_slug'=>'Enes CEMCİR özEL Lİnk'];
    $options=['slug'=>'blogs_slug','title'=>'blogs_title'];
    print_r(Slug::SlugFunc($blog,$options));
    */
    
    /*
    $rules=[
        'settings_description'=>['required','length'],
        'settings_key'=>['required','length'],
        'settings_value'=>['length','required']
    ];
    $validation=new Validate();
    print_r($validation->SetFields($arr)->SetRules($rules)->Make());
    */
    /*
    $keys=array_keys($arr);
    $options=['settings_description','settings_value'];
    $entity=Trim::TrimFunc(array_keys($arr),$arr,['settings_description','settings_value']);
    print_r($entity);

    $validate=ValidationTool::Validate(
        [
            SettingValidator::Empty($arr),
            SettingValidator::Number(['settings_id'=>$arr['settings_id']]),
            SettingValidator::Name(['settings_description'=>$arr['settings_description']])
        ]);
    print_r($validate);
    */
    //$crud=new CrudPDO();
    //$crud->update("settings",$arr,["columns"=>"settings_id"]);
    /*
    $settingService=new SettingManager(new MySqlSettingDal(),new Messages());
    $data=$settingService->GetById($db,new Setting(),1);
    print_r($data);
    */
    //$crud=new CrudPDO();
    /*
    $settingService=new SettingManager(new MySqlSettingModel(new MySqlEntityRepositoryBase(new Db(),new Setting()),new MySqlSettingDal(new Db()),new Messages()));
    print_r($settingService->GetAll());
    */
    /*
    require_once("../app/view.php");
    View::frontLayout();

    $str="/index/pilic-eti";
    $pattern="/index/([a-z-]+)";
    $pathCheck=preg_match("@^{$pattern}$@",$str,$params);
    if($pathCheck) {
        array_shift($params);
    }
    echo "<pre>";
    print_r($params);
    */ 
?>
