<?php
    // session_start(); 
    require_once 'models/M_Jadwal-Karyawan.php';

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
        public function getDatabyId() {
            $id= $_GET['id'];
            $result = $this->jadwalModel->getDatabyId($id); 
            return $result;
        }

        public function addData() {
            $jenis = $_POST['jenis'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
    
            $errors = $this->cekData($jenis, $jam, $tanggal);
            
            if (count($errors) === 0) {
                $this->jadwalModel->addData($jenis, $jam, $tanggal);
            }
        }
        public function editData() {
            $jenis = $_POST['jenis'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
            $id= $_GET['id'];
    
            $errors = $this->cekData($jenis, $jam, $tanggal);
            
            if (count($errors) === 0) {
                $this->jadwalModel->editData($id, $jenis, $jam, $tanggal);
            }
        }

        private function cekData($jenis, $jam, $tanggal) {
            
            $errors = array();
    
            if(empty($jenis)||empty($jam)||empty($tanggal)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteData() {
            $id= $_GET['id'];
            
            $this->jadwalModel->deleteData($id);
            
        }

    }
?>