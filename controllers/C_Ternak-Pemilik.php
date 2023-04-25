<?php
    // session_start(); 
    require_once 'models/M_Ternak-Pemilik.php';

    class Ternak {


        private $ternakModel;
    
        public function __construct() {
            $this->ternakModel = new TernakModel();
        }
    
    
        public function getData() {
            $result = $this->ternakModel->getData(); 
            return $result;
        }

        public function jumlahData() {
            $result = $this->ternakModel->jumlahData(); 
            return $result;
        }

    }
?>