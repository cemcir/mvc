<?php 
    class Db {
        private static $dbhost="localhost";
        private static $dbuser="root";
        private static $dbpass="";
        private static $dbname="panel";
        private static $instance=null;
        private static $connection;

        public static function GetInstance() {
            if(is_null(self::$instance)) {
                self::$instance=new Db();
            }
            return self::$instance;
        }

        private function __construct() {
            self::Connect();
        }

        private function __clone() {}

        //private function __wakeup() {}

        private static function Connect() {
            try {
                self::$connection=new PDO('mysql:host=' .self::$dbhost. ';dbname=' .self::$dbname. ';charset=utf8',self::$dbuser,self::$dbpass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                //echo "Bağlantı Başarılı";
            }
            catch(PDOException $e) {
                die("Bağlantı Başarısız:" . $e->getMessage());
            }
        }

        public static function GetConnection() {
            return self::$connection;
        }
    }
?>