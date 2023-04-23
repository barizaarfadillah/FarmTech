<?php
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

        // validasi form
        $errors = $this->cekData($nama, $email, $password, $cpassword, $namapeternakan);

        if (count($errors) > 0) {
            // tampilkan error ke form
            // echo $errors[0];
            require_once 'register.php';
            
        } else {
            // simpan data ke database
            $this->registerModel->register($nama, $email, $password, $namapeternakan);
            header('location: login-pemilik.php');

            // tampilkan pesan sukses ke user
            echo "Registration successful!";
        }
    }

    private function cekData($nama, $email, $password, $cpassword, $namapeternakan) {
        $errors = array();

        // validasi first name
        if (empty($nama)) {
            $errors[] = "Data wajib diisi";
        }

        // validasi last name
        if (empty($namapeternakan)) {
            $errors[] = "Data wajib diisi";
        }

        // validasi email
        if (empty($email)) {
            $errors[] = "Data wajib diisi";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        } elseif ($this->registerModel->cekEmail($email)) {
            $errors[] = "Email sudah terdaftar";
        }

        // validasi password
        if (empty($password)) {
            $errors[] = "Data wajib diisi";
        } elseif ($password != $cpassword) {
            $errors[] = "Passwords tidak cocok";
        }

        return $errors;
    }
}
?>