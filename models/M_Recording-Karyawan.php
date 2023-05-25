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
    
    public function RecordingProduksibyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_produksi.id_produksi, recording_produksi.nama_produk, recording_produksi.tanggal_produksi, recording_produksi.jumlah_produksi, karyawan.nama FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND recording_produksi.id_produksi = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function RecordingProduksi() {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_produksi.id_produksi, recording_produksi.nama_produk, recording_produksi.tanggal_produksi, recording_produksi.jumlah_produksi, karyawan.nama FROM karyawan JOIN recording_produksi ON karyawan.id_karyawan = recording_produksi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' ORDER BY recording_produksi.tanggal_produksi");
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

        $stmt = $this->conn->prepare("UPDATE stok_produk SET jumlah_produk = jumlah_produk + '$jumlah' WHERE nama_produk = '$nama'");
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

    public function Stok(){
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT * FROM karyawan JOIN stok_produk ON karyawan.id_karyawan = stok_produk.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function addStok($kode, $nama){
        $jumlah = 0;
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO stok_produk (kode_produk, nama_produk, jumlah_produk, karyawan_id_karyawan) VALUES ('$kode', '$nama', '$jumlah', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }

    public function deleteStok($kode){
        $stmt = $this->conn->prepare("DELETE FROM stok_produk WHERE kode_produk = '$kode'");
        $stmt->execute();
        $stmt->close();
    }
    
}

class PenjualanModel {
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

    public function RecordingPenjualan() {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_penjualan.id_penjualan, recording_penjualan.nama_produk, recording_penjualan.tanggal_penjualan, recording_penjualan.jumlah_produk, recording_penjualan.total, karyawan.nama FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' ORDER BY recording_penjualan.tanggal_penjualan");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    

    public function RecordingPenjualanbyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT recording_penjualan.id_penjualan, recording_penjualan.nama_produk, recording_penjualan.tanggal_penjualan, recording_penjualan.jumlah_produk, recording_penjualan.total karyawan.nama FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND recording_penjualan.id_penjualan = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($nama, $tanggal, $jumlah, $total) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO recording_penjualan (nama_produk, tanggal_penjualan, jumlah_produk, total, karyawan_id_karyawan) VALUES ('$nama', '$tanggal', '$jumlah', '$total', '$karyawan')");
        $stmt->execute();
        $stmt->close();

        $stmt = $this->conn->prepare("UPDATE stok_produk SET jumlah_produk = jumlah_produk - '$jumlah' WHERE nama_produk = '$nama'");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $nama, $tanggal, $jumlah, $total) {
        $stmt = $this->conn->prepare("UPDATE recording_penjualan SET nama_produk = '$nama', tanggal_penjualan = '$tanggal', jumlah_produk = '$jumlah', total = '$total' WHERE id_penjualan = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM recording_penjualan WHERE id_penjualan = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function jumlahData() {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT SUM(recording_penjualan.total) as total FROM karyawan JOIN recording_penjualan ON karyawan.id_karyawan = recording_penjualan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    
}
