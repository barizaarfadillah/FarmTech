<?php
// session_start();
require_once 'koneksi.php';

class JadwalModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function Pemilik() {
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

    public function Penjadwalan() {
        $pemilik = $this->Pemilik();
        $objDateTime = date_create("now", new DateTimeZone("Asia/Jakarta"));
        $tanggal = $objDateTime->format("Y-m-d");
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.tanggal = '$tanggal' ORDER BY penjadwalan.jam");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function PenjadwalanPakan() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Pakan'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function PenjadwalanVitamin() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Vitamin'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function PenjadwalanPerah() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Perah'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    
    
}

