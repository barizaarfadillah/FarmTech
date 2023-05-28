<?php
require_once 'koneksi.php';

class M_Pemilik {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    // Method untuk melakukan login
    public function login($email, $password) {
        if ($this->cekEmailTerdaftar($email) == true) {
            if ($this->cekPasswordBenar($email, $password) == true){
                $_SESSION['pemilik'] = $email;       
            }
        }
    }

    // Method untuk melakukan pengecekan email
    public function cekEmailTerdaftar($email){
        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE email = '$email'");
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
        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE email = '$email' AND password = $password");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Method untuk membuat password baru
    public function changePass($password){
        $email = $_SESSION['pemilik'];
        $stmt = $this->conn->prepare("UPDATE pemilik SET password = '$password' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengambil data pemilik
    public function Pemilik() {
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
                'password' => $row['password']
            );
            return $data;
        } else {
            return false;
        }
    }

    // Method untuk melakukan update data pemilik
    public function update($email, $nama, $peternakan, $alamat, $password, $image) {
        $stmt = $this->conn->prepare("UPDATE pemilik SET nama = '$nama', nama_peternakan = '$peternakan', alamat_peternakan = '$alamat', password = '$password', foto_profil = '$image' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk membuat akun pemilik
    public function register($nama, $email, $password, $namapeternakan, $alamat, $profil) {
        $stmt = $this->conn->prepare("INSERT INTO pemilik (nama, email, password, nama_peternakan, alamat_peternakan, foto_profil) VALUES ('$nama', '$email', '$password', '$namapeternakan', '$alamat', '$profil')");
        $stmt->execute();
        $stmt->close();
    }
    
}

