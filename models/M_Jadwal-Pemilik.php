<?php
// session_start();
require_once 'koneksi.php';

class JadwalModel {
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

    public function getData() {
        $pemilik = $this->getPemilik();
        $objDateTime = date_create("now", new DateTimeZone("Asia/Jakarta"));
        $tanggal = $objDateTime->format("Y-m-d");
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.tanggal = '$tanggal'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function getDataPakan() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Pakan'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function getDataVitamin() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Vitamin'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function getDataPerah() {
        $pemilik = $this->getPemilik();
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Perah'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    
    
}

