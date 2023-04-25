<?php
    // session_start(); 
    require_once 'models/M_Ternak-Karyawan.php';

    class Ternak {


        private $ternakModel;
    
        public function __construct() {
            $this->ternakModel = new TernakModel();
        }
    
    
        public function getData() {
            $result = $this->ternakModel->getData(); 
            return $result;
        }
        public function getDatabyId() {
            $id= $_GET['id'];
            $result = $this->ternakModel->getDatabyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->ternakModel->jumlahData(); 
            return $result;
        }

        public function addData() {
            $jenis = $_POST['jenis'];
            $tanggal = $_POST['tanggal'];
            $status = $_POST['status'];
    
            $errors = $this->cekData($jenis, $tanggal, $status);
            
            if (count($errors) === 0) {
                $this->ternakModel->addData($jenis, $tanggal, $status);
            }
        }
        public function editData() {
            $jenis = $_POST['jenis'];
            $tanggal = $_POST['tanggal'];
            $status = $_POST['status'];
            $id= $_GET['id'];
    
            $errors = $this->cekData($jenis, $tanggal, $status);
            
            if (count($errors) === 0) {
                $this->ternakModel->editData($id, $jenis, $tanggal, $status);
            }
        }

        private function cekData($jenis, $tanggal, $status) {
            
            $errors = array();
    
            if(empty($jenis)||empty($tanggal)||empty($status)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteData() {
            $id= $_GET['id'];
            
            $this->ternakModel->deleteData($id);
            
        }

    }
?>