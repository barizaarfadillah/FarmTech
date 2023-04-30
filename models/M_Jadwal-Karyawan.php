<?php
// session_start();
require_once 'koneksi.php';

class JadwalModel {
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

    public function getPenjadwalan() {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $objDateTime = date_create("now", new DateTimeZone("Asia/Jakarta"));
        $tanggal = $objDateTime->format("Y-m-d");
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.tanggal = '$tanggal' ORDER BY penjadwalan.jam");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function getPenjadwalanPakan() {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Pakan'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function getPenjadwalanVitamin() {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Vitamin'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function getPenjadwalanPerah() {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.jenis = 'Jadwal Perah'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function getPenjadwalanbyId($id) {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT penjadwalan.id_jadwal, penjadwalan.jenis, penjadwalan.jam, penjadwalan.tanggal FROM karyawan JOIN penjadwalan ON karyawan.id_karyawan = penjadwalan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND penjadwalan.id_jadwal = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function addPenjadwalan($jenis, $jam, $tanggal) {
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO penjadwalan (jenis, jam, tanggal, karyawan_id_karyawan) VALUES ('$jenis', '$jam', '$tanggal', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function updatePenjadwalan($id, $jenis, $jam, $tanggal) {
        $stmt = $this->conn->prepare("UPDATE penjadwalan SET jenis = '$jenis', tanggal = '$tanggal', jam = '$jam' WHERE id_jadwal = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function deletePenjadwalan($id) {
        $stmt = $this->conn->prepare("DELETE FROM penjadwalan WHERE id_jadwal = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    
}

