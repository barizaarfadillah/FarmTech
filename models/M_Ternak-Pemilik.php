<?php
// session_start();
require_once 'koneksi.php';

class TernakModel {
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

    public function getDataTernak() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT hewan_ternak.id_ternak, hewan_ternak.jenis, hewan_ternak.tanggal_pendataan, hewan_ternak.status FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function jumlahData() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}

