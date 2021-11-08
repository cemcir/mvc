<?php
    class SlidersController extends MainController {
        private $sliderService;

        public function __construct($db,$httpStatusCode) {
            $this->sliderService=new SliderManager(new MySqlSliderModel(new UnitOfWork($db,new MySqlSliderDal($db))));
            $this->httpStatusCode=$httpStatusCode;
        }

        public function GetAll() {
            $this->result=$this->sliderService->GetAll([]);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
            }
            else {
                if($this->result->Message==Messages::$SliderNotFound) {
                    http_response_code($this->httpStatusCode['NotFound']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        public function Add() {
            $this->data=$_POST;//formdan gelen verileri al
            $this->result=$this->sliderService->Add($this->data,['file_name'=>'sliders_file']);
            if($this->result->Success) {//işlem başarılı mı kontrol et
                http_response_code($this->httpStatusCode['OK']);
                unset($this->result->DeleteFile);// silinecek dosya olmadığından objeden kaldır
                $this->result->TmpName=$_FILES['sliders_file']['tmp_name'];//klasöre taşınacak dosya tmp_name ini değişkene ata ön yüz için
            }
            else {
                if(!empty($this->result->arrMessage)) { //doğrulamada hata mesajı var mı kontrol et
                    http_response_code($this->httpStatusCode['UnprocessableEntity']);//formdan gelen verilerde doğrulama hatası varsa 422 hata durum kodunu dön
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);//sunucu bazlı genel bir hata varsa 500 hata durum kodu dön
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        public function Update() {
            $this->data=$_POST;
            $file_delete=$this->data['delete_file'];
            unset($this->data['delete_file']);
            $this->result=$this->sliderService->Update($this->data,['file_name'=>'sliders_file']);
            if($this->result->Success) {
                http_response_code($this->httpStatusCode['OK']);
                $this->result->TmpName=$_FILES['sliders_file']['tmp_name'];
                $this->result->DeleteFile=$file_delete;
            }
            else {
                if(!empty($this->result->arrMessage)) {
                    http_response_code($this->httpStatusCode['UnprocessableEntity']);
                }
                else {
                    http_response_code($this->httpStatusCode['InternalServerError']);
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

    }
?>