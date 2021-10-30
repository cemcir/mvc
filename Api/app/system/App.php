<?php
    class App {
        protected $nowPath;
        protected $nowMethod;
        protected static $routes=[];
        protected $home;
        protected $module;
        protected $controller;
        protected $method;
        protected $file;
        protected $class;
        protected $httpStatusCode;
        public function __construct($config,$httpStatusCode) {
            $this->nowPath=$_SERVER['REQUEST_URI'];
            $this->nowMethod=$_SERVER['REQUEST_METHOD'];
            $this->home=$config['home'];
            $this->httpStatusCode=$httpStatusCode;
            $this->startRoute();
        }

        public static function getAction($link,$path,$auth=false,$area=null) {
            self::$routes[]=['GET',$link,$path,$auth,$area];
        }

        public static function postAction($link,$path,$auth=false,$area=null) {
            self::$routes[]=['POST',$link,$path,$auth,$area];
        }

        public function startRoute() {
            foreach(self::$routes as $route) {
                list($method,$link,$path,$auth,$area)=$route;
                $methodCheck=$this->nowMethod==$method;
                //$pathCheck=$this->nowPath==$link;
                $pathCheck=preg_match("@^{$link}$@",$this->nowPath,$params);
                if($methodCheck && $pathCheck) {
                    if($this->nowPath=="/") {
                       $this->module = $this->home['modul'];
                       $this->controller = $this->home['modul']."Controller";
                       $this->method = $this->home['method'];
                    }
                    else {

                        if($auth==true && $area=="frontend" && isset($_SESSION['users']) ||
                            $auth==true && $area=="backend" && isset($_SESSION['admins']) ||
                            $auth==false)
                        {
                            $uri=explode("/",$path);
                            array_shift($uri);
                            list($activeModul,$activeMethod)=$uri;  

                            $this->module=$activeModul;
                            $this->controller=$activeModul."Controller";
                            $this->method=$activeMethod;
                        }
                        else {
                            if($area=="frontend") {
                                Header("Location:/login");
                                exit;
                            }
                            else if($area=="backend") {
                                Header("Location:/nedmin/login");
                                exit;
                            }
                        }
                    }
                    $this->file=DIRECTORY."/moduls/{$this->module}/controller/{$this->controller}.php";
                    if(file_exists($this->file)) {
                        require_once($this->file);
                        if(class_exists($this->controller)) {
                            $this->class=new $this->controller($this->httpStatusCode);
                            if(method_exists($this->class,$this->method)) {
                                array_shift($params);
                                //echo "<pre>";
                                //print_r($params); 
                                return call_user_func_array([$this->class,$this->method],array_values($params));
                            }
                            else {
                                echo "Method Not Found";
                                echo "<br/>";
                            }
                        }
                        else {
                            echo "Class Not Found";
                        }
                    }
                    else {
                        echo "Controller Not Found";
                        echo "<br/>";
                    }
                }     
            }
            echo "404 sayfa bulunamadı !";
        }
    }
?>