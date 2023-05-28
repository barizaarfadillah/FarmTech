<?php
require_once 'koneksi.php';

class M_Karyawan {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    // Method untuk melakukan login
    public function login($email, $password) {
        if ($this->cekEmailTerdaftar($email) == true) {
            if ($this->cekPasswordBenar($email, $password) == true){
                $_SESSION['karyawan'] = $email;       
            }
        }
    }

    // Method untuk melakukan pengecekan email
    public function cekEmailTerdaftar($email){
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    // Method untuk melakukan pengecekan password
    public function cekPasswordBenar($email, $password){
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE email = '$email' AND password = $password");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Method untuk mengambil data akun karyawan
    public function Karyawan() {
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

    // Method untuk melakukan update data karyawan
    public function update($email, $nama, $alamat, $no_hp, $password, $image) {
        $stmt = $this->conn->prepare("UPDATE karyawan SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', password = '$password', foto_profile = '$image' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk membuat password baru
    public function changePass($password){
        $email = $_SESSION['karyawan'];
        $stmt = $this->conn->prepare("UPDATE karyawan SET password = '$password' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }

    // // Method untuk mengambil data pemilik
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

    // Method untuk mengambil data karyawan
    public function getKaryawan() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT * FROM karyawan WHERE pemilik_id_pemilik = '$pemilik' AND status = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
        
    }

    // Method untuk menambahkan data karyawan
    public function add($email, $password) {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("INSERT INTO karyawan (nama, email, password, alamat, no_hp, foto_profile, pemilik_id_pemilik, status) VALUES (' ', '$email', '$password', ' ', ' ', 'default.svg', '$pemilik', 1)");
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk menghapus data karyawan
    public function hapus($id) {
        $stmt = $this->conn->prepare("UPDATE karyawan SET status = 0 WHERE id_karyawan = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk melihat jumlah data karyawan
    public function jumlahData() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM karyawan WHERE pemilik_id_pemilik='$pemilik' AND status = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
}

