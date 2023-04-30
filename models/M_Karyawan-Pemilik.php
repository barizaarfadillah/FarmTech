<?php
// session_start();
require_once 'koneksi.php';

class KaryawanModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function getPemilik() {
        $pemilik = $_SESSION['pemilik'];
        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE email = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id_pemilik'];
        } else {
            return false;
        }
    }

    public function getDataAkun() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE pemilik_id_pemilik = '$pemilik' AND status = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
        
    }

    public function addDataAkun($email, $password) {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("INSERT INTO karyawan (nama, email, password, alamat, no_hp, foto_profile, pemilik_id_pemilik, status) VALUES (' ', '$email', '$password', ' ', ' ', 'default.svg', '$pemilik', 1)");
        $stmt->execute();
        $stmt->close();
    }

    public function hapus($id) {
        $stmt = $this->conn->prepare("UPDATE karyawan SET status = 0 WHERE id_karyawan = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function jumlahData() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM karyawan WHERE pemilik_id_pemilik='$pemilik' AND status = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}

