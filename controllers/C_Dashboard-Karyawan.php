<?php
    // session_start(); 
    require_once 'models/M_Dashboard-Karyawan.php';

    class Dashboard {
        private $dashboardModel;
    
        public function __construct() {
            $this->dashboardModel = new DashboardModel();
        }
    
    
        public function getData() {
            
            return $this->dashboardModel->getData();
        }
        public function getKaryawan() {
            
            return $this->dashboardModel->getKaryawan();
        }
    
    }
?>