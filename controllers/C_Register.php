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
            $this->registerModel->register($nama, $email, $password, $namapeternakan, $alamat, $profil);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                    swal({
                        title: 'Registrasi Berhasil',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='login-pemilik.php';
                    });
                </script>";
        }
    }

    private function cekData($nama, $email, $password, $cpassword, $namapeternakan) {
        $errors = array();

        if(empty($nama)||empty($namapeternakan)||empty($email)||empty($password)||empty($cpassword)){
            $errors['error'] = "Data wajib diisi";
        } elseif ($this->registerModel->cekEmail($email)){
            $errors['error'] = "Email sudah terdaftar";
        } elseif ($password !== $cpassword){
            $errors['error'] = "Password Tidak Sama";
        }
        
        return $errors;
    }
}
?>