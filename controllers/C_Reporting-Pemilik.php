<?php
    // session_start(); 
    require_once 'models/M_Reporting-Pemilik.php';

    class Reporting {

        private $ReportingPakanModel;
        private $ReportingPerahModel;
        private $ReportingVitaminModel;
    
        public function __construct() {
            $this->ReportingPakanModel = new ReportingPakanModel();
            $this->ReportingPerahModel = new ReportingPerahModel();
            $this->ReportingVitaminModel = new ReportingVitaminModel();
        }
    
        public function getReporting() {
            $array = $this->ReportingPakanModel->reporting(); 
            return $array;
        }

        public function getReportingPakan() {
            $result = $this->ReportingPakanModel->ReportingPakan(); 
            return $result;
        }

        public function getReportingVitamin() {
            $result = $this->ReportingVitaminModel->ReportingVitamin(); 
            return $result;
        }
        
        public function getReportingPerah() {
            $result = $this->ReportingPerahModel->ReportingPerah(); 
            return $result;
        }
    }
?>