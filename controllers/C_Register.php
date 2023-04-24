<?php
session_start();
require_once 'models/M_Register.php';

class Register {
    private $registerModel;

    public function __construct() {
        $this->registerModel = new RegisterModel();
    }


    public function register() {
        $nama = $_POST['nama'];
        $namapeternakan = $_POST['namapeternakan'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $alamat = ' ';
        $profil = 'default.svg';

        $errors = $this->cekData($nama, $email, $password, $cpassword, $namapeternakan);
        
        if (count($errors) > 0) {
            require_once 'register.php';
            
        } else {
            $this->registerModel->register($nama, $email, $password, $namapeternakan, $alamat, $profil);
            $_SESSION['info'] = "Registrasi, silahkan login";
            header('location: login-pemilik.php');
        }
    }

    private function cekData($nama, $email, $password, $cpassword, $namapeternakan) {
        $errors = array();

        if(empty($nama)||empty($namapeternakan)||empty($email)||empty($password)||empty($cpassword)){
            $errors['dataNull'] = "Data wajib diisi";
        } elseif ($this->registerModel->cekEmail($email)){
            $errors['email'] = "Email sudah terdaftar";
        } elseif ($password !== $cpassword){
            $errors['password'] = "Password tidak cocok";
        }
        
        return $errors;
    }
}
?>