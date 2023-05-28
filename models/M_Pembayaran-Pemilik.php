<?php
// session_start();
require_once 'koneksi.php';

class PembayaranModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function add($id, $tanggal, $metode, $rekening) {
        $stmt = $this->conn->prepare("INSERT INTO pembayaran (tanggal_pembayaran, metode_pembayaran, no_rekening, pemilik_id_pemilik) VALUES ('$tanggal', '$metode', '$rekening', '$id')");
        $stmt->execute();
        $stmt->close();
        $stmt = $this->conn->prepare("UPDATE pemilik SET status = 1 WHERE id_pemilik = '$id'");
        $stmt->execute();
        $stmt->close();
    }
    
}

