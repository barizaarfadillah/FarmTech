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
    
            // validasi form
            $errors = $this->cekDataNull($email, $password);
    
            if (count($errors) > 0) {
                require_once 'login-karyawan.php';
                
            } else {
                $this->loginModel->login($email, $password);
                $_SESSION['karyawan'] = $email;
				$_SESSION['login'] = true;
				header('location: karyawan.php');
            }
        }
    
        private function cekDataNull($email, $password) {
            $errors = array();
    
            if(empty($email)||empty($password)){
                $errors['dataNull'] = "Data wajib diisi";
            }
            
            return $errors;
        }
    }
?>