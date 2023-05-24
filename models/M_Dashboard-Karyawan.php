<?php
// session_start();
require_once 'koneksi.php';

class DashboardModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function getKaryawan() {
        $email = $_SESSION['karyawan'];
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    public function getData(){
        $row = $this->getKaryawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];

        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['status'];
        } else {
            return false;
        }
    }
    
    
}

