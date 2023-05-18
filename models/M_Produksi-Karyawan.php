<?php
// session_start();
require_once 'koneksi.php';

class ProduksiModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
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

    public function RecordingProduksi() {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_produksi.id_produksi, recording_produksi.nama_produk, recording_produksi.tanggal_produksi, recording_produksi.jumlah_produksi FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' ORDER BY recording_produksi.tanggal_produksi");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    

    public function RecordingProduksibyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_produksi.id_produksi, recording_produksi.nama_produk, recording_produksi.tanggal_produksi, recording_produksi.jumlah_produksi FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND recording_produksi.id_produksi = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($nama, $tanggal, $jumlah) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO recording_produksi (nama_produk, tanggal_produksi, jumlah_produksi, karyawan_id_karyawan) VALUES ('$nama', '$tanggal', '$jumlah', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $nama, $tanggal, $jumlah) {
        $stmt = $this->conn->prepare("UPDATE recording_produksi SET nama_produk = '$nama', tanggal_produksi = '$tanggal', jumlah_produksi = '$jumlah' WHERE id_produksi = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM recording_produksi WHERE id_produksi = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function jumlahData() {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT SUM(recording_produksi.jumlah_produksi) as total FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}

