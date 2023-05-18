<?php
// session_start();
require_once 'koneksi.php';

class ProduksiModel {
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

    public function RecordingProduksi() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT recording_produksi.id_produksi, recording_produksi.nama_produk, recording_produksi.tanggal_produksi, recording_produksi.jumlah_produksi FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' ORDER BY recording_produksi.tanggal_produksi");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    

    public function jumlahData() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT SUM(recording_produksi.jumlah_produksi) as total FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}

