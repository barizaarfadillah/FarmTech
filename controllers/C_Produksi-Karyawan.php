<?php
    // session_start(); 
    require_once 'models/M_Produksi-Karyawan.php';

    class Produksi {


        private $produksiModel;
    
        public function __construct() {
            $this->produksiModel = new ProduksiModel();
        }
    
    
        public function getData() {
            $result = $this->produksiModel->getData(); 
            return $result;
        }
        public function getDatabyId() {
            $id= $_GET['id'];
            $result = $this->produksiModel->getDatabyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->produksiModel->jumlahData(); 
            return $result;
        }

        public function addData() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
    
            $errors = $this->cekData($nama, $tanggal, $jumlah);
            
            if (count($errors) === 0) {
                $this->produksiModel->addData($nama, $tanggal, $jumlah);
            }
        }
        public function editData() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $id= $_GET['id'];
    
            $errors = $this->cekData($nama, $tanggal, $jumlah);
            
            if (count($errors) === 0) {
                $this->produksiModel->editData($id, $nama, $tanggal, $jumlah);
            }
        }

        private function cekData($nama, $tanggal, $jumlah) {
            
            $errors = array();
    
            if(empty($nama)||empty($tanggal)||empty($jumlah)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteData() {
            $id= $_GET['id'];
            
            $this->produksiModel->deleteData($id);
            
        }

    }
?>