<?php
    // session_start(); 
    require_once 'models/M_Karyawan-Pemilik.php';

    class Karyawan {


        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new KaryawanModel();
        }
    
    
        public function getData() {
            $result = $this->karyawanModel->getData(); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->karyawanModel->jumlahData(); 
            return $result;
        }

        public function addData() {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $errors = $this->cekData($nama, $email, $password);
            
            if (count($errors) === 0) {
                $this->karyawanModel->addData($nama, $email, $password);
            }
        }

        private function cekData($nama, $email, $password) {
            
            $errors = array();
    
            if(empty($nama)||empty($email)||empty($password)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteData() {
            $id= $_GET['id'];
            
            $this->karyawanModel->deleteData($id);
            
        }

    }
?>