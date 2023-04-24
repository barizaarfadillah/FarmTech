<?php
    // session_start(); 
    require_once 'models/M_Profil-Pemilik.php';

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
            $peternakan = $_POST['peternakan'];
            $alamat = $_POST['alamat'];
            

            $errors = $this->cekData($nama, $peternakan, $alamat);
            
            if (count($errors) === 0) {
                
                $this->profilModel->editProfil($email, $nama, $peternakan, $alamat);
                
            }
    
            
        }

        private function cekData($nama, $peternakan, $alamat) {
            
            $errors = array();
    
            if(empty($nama)||empty($peternakan)||empty($alamat)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }
    
    }
?>