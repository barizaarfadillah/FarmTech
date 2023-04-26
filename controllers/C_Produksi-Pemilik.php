<?php
    // session_start(); 
    require_once 'models/M_Produksi-Pemilik.php';

    class Produksi {


        private $produksiModel;
    
        public function __construct() {
            $this->produksiModel = new ProduksiModel();
        }
    
    
        public function getData() {
            $result = $this->produksiModel->getData(); 
            return $result;
        }

        public function jumlahData() {
            $result = $this->produksiModel->jumlahData(); 
            return $result;
        }
    }
?>