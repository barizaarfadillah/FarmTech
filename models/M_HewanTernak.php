<?php
require_once 'koneksi.php';

class M_HewanTernak {
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

    public function Karyawan() {
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

    public function DataTernak() {
        if($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
            $stmt = $this->conn->prepare("SELECT hewan_ternak.id_ternak, hewan_ternak.jenis, hewan_ternak.tanggal_pendataan, hewan_ternak.status FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            $pemilik = $this->Pemilik();
            $stmt = $this->conn->prepare("SELECT hewan_ternak.id_ternak, hewan_ternak.jenis, hewan_ternak.tanggal_pendataan, hewan_ternak.status FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
    }

    public function DataTernakbyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT hewan_ternak.id_ternak, hewan_ternak.jenis, hewan_ternak.tanggal_pendataan, hewan_ternak.status FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND hewan_ternak.id_ternak = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($jenis, $tanggal, $status) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO hewan_ternak (jenis, tanggal_pendataan, status, karyawan_id_karyawan) VALUES ('$jenis', '$tanggal', '$status', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $jenis, $tanggal, $status) {
        $stmt = $this->conn->prepare("UPDATE hewan_ternak SET jenis = '$jenis', tanggal_pendataan = '$tanggal', status = '$status' WHERE id_ternak = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM hewan_ternak WHERE id_ternak = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function jumlahData() {
        if ($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row;
        } else {
            $pemilik = $this->Pemilik();
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM karyawan JOIN hewan_ternak ON karyawan.id_karyawan = hewan_ternak.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row;
        }
    }
    
}

