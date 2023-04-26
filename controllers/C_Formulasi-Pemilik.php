<?php
    // session_start(); 
    require_once 'models/M_Formulasi-Pemilik.php';

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


    }
?>