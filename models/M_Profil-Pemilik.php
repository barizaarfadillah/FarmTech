<?php
// session_start();
require_once 'koneksi.php';

class ProfilModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function getData() {
        $email = $_SESSION['pemilik'];
        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = array(
                'id' => $row['id_pemilik'],
                'nama' => $row['nama'],
                'email' => $row['email'],
                'peternakan' => $row['nama_peternakan'],
                'alamat' => $row['alamat_peternakan'],
                'profil' => $row['foto_profil'],
            );
            return $data;
        } else {
            return false;
        }
    }

    public function editProfil($email, $nama, $peternakan, $alamat) {
        $stmt = $this->conn->prepare("UPDATE pemilik SET nama = '$nama', nama_peternakan = '$peternakan', alamat_peternakan = '$alamat' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }
    
}

