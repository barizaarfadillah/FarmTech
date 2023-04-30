<?php
    // session_start(); 
    require_once 'models/M_Jadwal-Pemilik.php';

    class Jadwal {


        private $jadwalModel;
    
        public function __construct() {
            $this->jadwalModel = new JadwalModel();
        }
    
        public function getPenjadwalan() {
            $result = $this->jadwalModel->getPenjadwalan(); 
            return $result;
        }
        public function getPenjadwalanPakan() {
            $result = $this->jadwalModel->getPenjadwalanPakan(); 
            return $result;
        }
        public function getPenjadwalanVitamin() {
            $result = $this->jadwalModel->getPenjadwalanVitamin(); 
            return $result;
        }
        public function getPenjadwalanPerah() {
            $result = $this->jadwalModel->getPenjadwalanPerah(); 
            return $result;
        }
    }
?>