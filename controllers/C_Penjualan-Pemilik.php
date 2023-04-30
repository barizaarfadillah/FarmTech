<?php
    // session_start(); 
    require_once 'models/M_Penjualan-Pemilik.php';

    class Penjualan {


        private $penjualanModel;
    
        public function __construct() {
            $this->penjualanModel = new PenjualanModel();
        }
    
    
        public function getRecordingPenjualan() {
            $result = $this->penjualanModel->getRecordingPenjualan(); 
            return $result;
        }
       
        public function jumlahData() {
            $result = $this->penjualanModel->jumlahData(); 
            return $result;
        }

    }
?>