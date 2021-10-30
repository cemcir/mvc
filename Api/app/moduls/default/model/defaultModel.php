<?php
    class defaultModel extends mainModel {
        
        function __construct($object) {
            parent::__construct($object);
        }

        public function index() {                 
            try {
                $stmt=$this->db->read('blogs');
                if($stmt->rowCount()>0) {
                    $result=$stmt->fetchAll(PDO::FETCH_ASSOC); 
                    return ['status'=>TRUE,'result'=>$result];
                }
                return ['status'=>FALSE,'error'=>httpStatusCodes::HttpStatus(404),'message'=>'kayıtlı blog bilgisi bulunamadı'];
            }
            catch(PDOException $e) {
                return ['status'=>FALSE,'error'=>httpStatusCodes::HttpStatus(500),'message'=>$e->getMessage];
            }
            catch(Exception $t) {
                return ['status'=>FALSE,'error'=>httpStatusCodes::HttpStatus(500),'message'=>$t->getMessage()];
            }
        }
    }
?>
