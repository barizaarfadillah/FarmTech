<?php
    // session_start(); 
    require_once 'models/M_Penjualan-Pemilik.php';

    class Penjualan {


        private $penjualanModel;
    
        public function __construct() {
            $this->penjualanModel = new PenjualanModel();
        }
    
    
        public function getData() {
            $result = $this->penjualanModel->getData(); 
            return $result;
        }
       
        public function jumlahData() {
            $result = $this->penjualanModel->jumlahData(); 
            return $result;
        }

    }
?>