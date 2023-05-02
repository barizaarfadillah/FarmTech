<?php
    // session_start(); 
    require_once 'models/M_Formulasi-Pemilik.php';

    class Formulasi {


        private $formulasiModel;
    
        public function __construct() {
            $this->formulasiModel = new FormulasiModel();
        }
    
    
        public function getFormulasi() {
            $result = $this->formulasiModel->getFormulasi(); 
            return $result;
        }


    }
?>