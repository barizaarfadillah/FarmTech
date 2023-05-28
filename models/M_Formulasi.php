<?php
require_once 'koneksi.php';

class M_Formulasi {
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

    public function Formulasi() {
        if ($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
            $stmt = $this->conn->prepare("SELECT formulasi.id, formulasi.rentang_berat, formulasi.nama_pakan, formulasi.berat_pakan, formulasi.jangka_waktu FROM karyawan JOIN formulasi ON karyawan.id_karyawan = formulasi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            $pemilik = $this->Pemilik();
            $stmt = $this->conn->prepare("SELECT formulasi.id, formulasi.rentang_berat, formulasi.nama_pakan, formulasi.berat_pakan, formulasi.jangka_waktu FROM karyawan JOIN formulasi ON karyawan.id_karyawan = formulasi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
    }
    public function FormulasibyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT formulasi.id, formulasi.rentang_berat, formulasi.nama_pakan, formulasi.berat_pakan, formulasi.jangka_waktu FROM karyawan JOIN formulasi ON karyawan.id_karyawan = formulasi.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND formulasi.id = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($rentang, $nama, $berat, $jangka) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $stmt = $this->conn->prepare("INSERT INTO formulasi (rentang_berat, nama_pakan, berat_pakan, jangka_waktu, karyawan_id_karyawan) VALUES ('$rentang', '$nama', '$berat', '$jangka' ,'$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $rentang, $nama, $berat, $jangka) {
        $stmt = $this->conn->prepare("UPDATE formulasi SET rentang_berat = '$rentang', nama_pakan = '$nama', berat_pakan = '$berat', jangka_waktu = '$jangka' WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM formulasi WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    
}

