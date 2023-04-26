<?php
    // session_start(); 
    require_once 'models/M_Formulasi-Karyawan.php';

    class Formulasi {


        private $formulasiModel;
    
        public function __construct() {
            $this->formulasiModel = new FormulasiModel();
        }
    
    
        public function getData() {
            $result = $this->formulasiModel->getData(); 
            return $result;
        }
        public function getDatabyId() {
            $id= $_GET['id'];
            $result = $this->formulasiModel->getDatabyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->formulasiModel->jumlahData(); 
            return $result;
        }

        public function addData() {
            $rentang = $_POST['rentang'];
            $nama = $_POST['nama'];
            $berat = $_POST['berat'];
            $jangka = $_POST['jangka'];
    
            $errors = $this->cekData($rentang, $nama, $berat, $jangka);
            
            if (count($errors) === 0) {
                $this->formulasiModel->addData($rentang, $nama, $berat, $jangka);
            }
        }
        public function editData() {
            $rentang = $_POST['rentang'];
            $nama = $_POST['nama'];
            $berat = $_POST['berat'];
            $jangka = $_POST['jangka'];
            $id= $_GET['id'];
    
            $errors = $this->cekData($rentang, $nama, $berat, $jangka);
            
            if (count($errors) === 0) {
                $this->formulasiModel->editData($id, $rentang, $nama, $berat, $jangka);
            }
        }

        private function cekData($rentang, $nama, $berat, $jangka) {
            
            $errors = array();
    
            if(empty($rentang)||empty($nama)||empty($berat)||empty($jangka)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteData() {
            $id= $_GET['id'];
            
            $this->formulasiModel->deleteData($id);
            
        }

    }
?>