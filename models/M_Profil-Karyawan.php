<?php
// session_start();
require_once 'koneksi.php';

class ProfilModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function getKaryawan() {
        $email = $_SESSION['karyawan'];
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    public function simpan($email, $nama, $alamat, $no_hp, $password) {
        $stmt = $this->conn->prepare("UPDATE karyawan SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', password = '$password' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }
    
}

