<?php
    session_start();
    require_once 'models/M_Login-Karyawan.php';

    class Login {
        private $loginModel;
    
        public function __construct() {
            $this->loginModel = new LoginModel();
        }

        public function login() {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if(empty($email)||empty($password)){
                echo "<script>alert('Data wajib diisi');</script>";
            } else {
                $this->loginModel->login($email, $password);
            }
        }
    }
?>