<?php
    // session_start(); 
    require_once 'models/M_Profil-Karyawan.php';

    class Profil {


        private $profilModel;
    
        public function __construct() {
            $this->profilModel = new ProfilModel();
        }
    
    
        public function getData() {
            
            return $this->profilModel->getData();
        }

        public function editProfil() {
            $email = $_POST['email'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            

            $this->profilModel->editProfil($email, $nama, $alamat, $no_hp);
            // $errors = $this->cekData($nama, $alamat, $no_hp);
            
            // if (count($errors) === 0) {
                
                
            // }
    
            
        }

        private function cekData($nama, $alamat, $no_hp) {
            
            $errors = array();
    
            if(empty($nama)||empty($alamat)||empty($no_hp)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }
    
    }
?>