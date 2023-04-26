<?php
    // session_start(); 
    require_once 'models/M_Penjualan-Karyawan.php';

    class Penjualan {


        private $penjualanModel;
    
        public function __construct() {
            $this->penjualanModel = new PenjualanModel();
        }
    
    
        public function getData() {
            $result = $this->penjualanModel->getData(); 
            return $result;
        }
        public function getDatabyId() {
            $id= $_GET['id'];
            $result = $this->penjualanModel->getDatabyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->penjualanModel->jumlahData(); 
            return $result;
        }

        public function addData() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];
    
            $errors = $this->cekData($nama, $tanggal, $jumlah, $total);
            
            if (count($errors) === 0) {
                $this->penjualanModel->addData($nama, $tanggal, $jumlah, $total);
            }
        }
        public function editData() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];
            $id= $_GET['id'];
    
            $errors = $this->cekData($nama, $tanggal, $jumlah, $total);
            
            if (count($errors) === 0) {
                $this->penjualanModel->editData($id, $nama, $tanggal, $jumlah, $total);
            }
        }

        private function cekData($nama, $tanggal, $jumlah, $total) {
            
            $errors = array();
    
            if(empty($nama)||empty($tanggal)||empty($jumlah)||empty($total)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteData() {
            $id= $_GET['id'];
            
            $this->penjualanModel->deleteData($id);
            
        }

    }
?>