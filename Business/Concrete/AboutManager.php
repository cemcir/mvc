<?php
    class AboutManager implements IAboutService {
        private $aboutModel;

        public function __construct($aboutModel) {
            $this->aboutModel=$aboutModel;
        }

        public function GetBySlug($slug):IDataResult {
            return $this->aboutModel->GetByColumn('abouts_slug',$slug,Messages::$AboutNotFound);
        }
    }
?>