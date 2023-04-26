<?php
require_once 'koneksi.php';

class RegisterModel {
    private $conn;

    
    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function register($nama, $email, $password, $namapeternakan, $alamat, $profil) {
        $stmt = $this->conn->prepare("INSERT INTO pemilik (nama, email, password, nama_peternakan, alamat_peternakan, foto_profil) VALUES ('$nama', '$email', '$password', '$namapeternakan', '$alamat', '$profil')");
        $stmt->execute();
        $stmt->close();
    }

    public function cekEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
