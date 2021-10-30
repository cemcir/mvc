<?php
    class nedminModel extends mainModel {

        function __construct($object) {
            parent::__construct($object);
        }

        public function indexModel() {
           
        }

        public function loginControl() {
            $remember_me=null;
            if(isset($_POST['remember_me'])) {
                $remember_me=$_POST['remember_me'];
            }
            $result=$this->db->adminsLogin(
               htmlspecialchars($_POST['admins_username']),
               htmlspecialchars($_POST['admins_pass']),
               $remember_me
            );
            return $result;
        }

        public function logout() {
            $this->db->nedminLogout();
        }

        public function settings($table_name) {
            try {
                $stmt=$this->db->read($table_name,['columns_name'=>'settings_must','columns_sort'=>'ASC']);
                if($stmt->rowCount()>0) {
                    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    return ['status'=>TRUE,'statusCode'=>200,'result'=>$result];
                }
                else {
                    return ['status'=>FALSE,'statusCode'=>404,'message'=>'kayıtlı ayar bilgisi bulunamadı'];
                }
            }
            catch(Exception $e) {
                return ['status'=>FALSE,'statusCode'=>500,'message'=>$e->getMessage()];
            }
            catch(PDOException $e) {
                return ['status'=>FALSE,'statusCode'=>500,'message'=>$e->getMessage()];
            }
        }
        
        public function settingsUpdate($table_name,$settings_id) {
            try {
                $stmt=$this->db->wread($table_name,'settings_id',intval($settings_id));
                if($stmt->rowCount()==1) {
                    $result=$stmt->fetch(PDO::FETCH_ASSOC);
                    return ['status'=>TRUE,'statusCode'=>200,'result'=>$result];
                }
                return ['status'=>FALSE,'statusCode'=>404,'message'=>'id ye ait ayar bilgisi bulunamadı'];
            }
            catch(PDOException $e) {
                return ['status'=>FALSE,'statusCode'=>500,'message'=>$e->getMessage()];
            }
        }

        public function settingsUpdateOp($table_name,$values) {
            try { 
                $stmt=$this->db->update($table_name,$values,
                [
                    "form_name"=>"settings_update",
                    "columns"=>$this->object->columns,
                    "dir"=>$this->object->dir,
                    "file_name"=>$this->object->file_name,
                    "file_delete"=>$this->object->file_delete,
                ]);
                return $stmt;
            }
            catch(PDOException $e) {

            }
        }
    }
?>