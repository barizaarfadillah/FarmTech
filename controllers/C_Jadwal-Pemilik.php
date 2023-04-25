<?php
    // session_start(); 
    require_once 'models/M_Jadwal-Pemilik.php';

    class Jadwal {


        private $jadwalModel;
    
        public function __construct() {
            $this->jadwalModel = new JadwalModel();
        }
    
        public function getData() {
            $result = $this->jadwalModel->getData(); 
            return $result;
        }
        public function getDataPakan() {
            $result = $this->jadwalModel->getDataPakan(); 
            return $result;
        }
        public function getDataVitamin() {
            $result = $this->jadwalModel->getDataVitamin(); 
            return $result;
        }
        public function getDataPerah() {
            $result = $this->jadwalModel->getDataPerah(); 
            return $result;
        }
    }
?>