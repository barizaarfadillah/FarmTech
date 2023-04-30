<?php
// session_start();
require_once 'koneksi.php';

class PenjualanModel {
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

    public function getRecordingPenjualan() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT recording_penjualan.id_penjualan, recording_penjualan.nama_produk, recording_penjualan.tanggal_penjualan, recording_penjualan.jumlah_produk, recording_penjualan.total FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' ORDER BY recording_penjualan.tanggal_penjualan");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function jumlahData() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT SUM(recording_penjualan.total) as total FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}

