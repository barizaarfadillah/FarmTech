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

            $errors = $this->cekDataNull($email, $password);
            if (empty($errors)){
                $errors = $this->cekEmailTerdaftar($email);
                if (empty($errors)){
                    $errors = $this->cekPasswordBenar($email, $password);
                }
            }
        
            if (count($errors) > 0) {
                $errors = $errors['error'];
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                swal({
                    title: '$errors',
                    icon: 'warning',
                    button: 'Oke'
                })
            </script>";
                
            } else {
                $this->loginModel->login($email, $password);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                    swal({
                        title: 'Login Berhasil',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='karyawan.php';
                    });
                    </script>";
            }
        }

        private function cekDataNull($email, $password) {
            $errors = array();
    
            if(empty($email)||empty($password)){
                $errors['error'] = "Data harus diisi";
            } 
            
            return $errors;
        }
        private function cekPasswordBenar($email, $password) {
            $errors = array();
    
            if ($this->loginModel->cekPasswordBenar($email, $password) == false){
                $errors['error'] = "Password Salah";
            }
            
            return $errors;
        }
        private function cekEmailTerdaftar($email) {
            $errors = array();
    
            if ($this->loginModel->cekEmailTerdaftar($email) == false){
                $errors['error'] = "Akun tidak terdaftar";
            }
            
            return $errors;
        }
        
    }
?>