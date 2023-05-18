<?php
    // session_start(); 
    require_once 'models/M_Jadwal-Pemilik.php';

    class Jadwal {


        private $jadwalModel;
    
        public function __construct() {
            $this->jadwalModel = new JadwalModel();
        }
    
        public function getPenjadwalan() {
            $result = $this->jadwalModel->Penjadwalan(); 
            return $result;
        }
        public function getPenjadwalanPakan() {
            $result = $this->jadwalModel->PenjadwalanPakan(); 
            return $result;
        }
        public function getPenjadwalanVitamin() {
            $result = $this->jadwalModel->PenjadwalanVitamin(); 
            return $result;
        }
        public function getPenjadwalanPerah() {
            $result = $this->jadwalModel->PenjadwalanPerah(); 
            return $result;
        }
    }
?>