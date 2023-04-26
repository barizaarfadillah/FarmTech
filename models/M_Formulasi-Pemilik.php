<?php
// session_start();
require_once 'koneksi.php';

class FormulasiModel {
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
        $stmt = $this->conn->prepare("SELECT formulasi.id, formulasi.rentang_berat, formulasi.nama_pakan, formulasi.berat_pakan, formulasi.jangka_waktu FROM karyawan JOIN formulasi ON karyawan.id_karyawan = formulasi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}

