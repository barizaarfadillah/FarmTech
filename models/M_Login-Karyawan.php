<?php
require_once 'koneksi.php';

class LoginModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password'");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $_SESSION['karyawan'] = $email;
            header('location: karyawan.php');
        } else {
            echo "<script>alert('Email atau password salah');</script>";
        }

    }
    
    
}

