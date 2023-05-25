<?php
    // session_start(); 
    require_once 'models/M_Recording-Pemilik.php';

    class Recording {

        private $produksiModel;
        private $penjualanModel;
    
        public function __construct() {
            $this->produksiModel = new ProduksiModel();
            $this->penjualanModel = new PenjualanModel();
        }

        public function getStok(){
            $result = $this->produksiModel->Stok(); 
            return $result;
        }
    
        public function getRecordingProduksi() {
            $result = $this->produksiModel->RecordingProduksi(); 
            return $result;
        }

        public function jumlahDataProduksi() {
            $result = $this->produksiModel->jumlahDataProduksi(); 
            return $result;
        }

        public function getRecordingPenjualan() {
            $result = $this->penjualanModel->RecordingPenjualan(); 
            return $result;
        }
       
        public function jumlahDataPenjualan() {
            $result = $this->penjualanModel->jumlahDataPenjualan(); 
            return $result;
        }
    }
?>