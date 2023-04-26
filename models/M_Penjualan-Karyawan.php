<?php
// session_start();
require_once 'koneksi.php';

class PenjualanModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function getKaryawan() {
        $karyawan = $_SESSION['karyawan'];
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE email = '$karyawan'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    public function getData() {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_penjualan.id_penjualan, recording_penjualan.nama_produk, recording_penjualan.tanggal_penjualan, recording_penjualan.jumlah_produk, recording_penjualan.total FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' ORDER BY recording_penjualan.tanggal_penjualan");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    

    public function getDatabyId($id) {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_penjualan.id_penjualan, recording_penjualan.nama_produk, recording_penjualan.tanggal_penjualan, recording_penjualan.jumlah_produk, recording_penjualan.total FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND recording_penjualan.id_penjualan = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function addData($nama, $tanggal, $jumlah, $total) {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO recording_penjualan (nama_produk, tanggal_penjualan, jumlah_produk, total, karyawan_id_karyawan) VALUES ('$nama', '$tanggal', '$jumlah', '$total', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function editData($id, $nama, $tanggal, $jumlah, $total) {
        $stmt = $this->conn->prepare("UPDATE recording_penjualan SET nama_produk = '$nama', tanggal_penjualan = '$tanggal', jumlah_produk = '$jumlah', total = '$total' WHERE id_penjualan = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function deleteData($id) {
        $stmt = $this->conn->prepare("DELETE FROM recording_penjualan WHERE id_penjualan = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function jumlahData() {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT SUM(recording_penjualan.total) as total FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}

