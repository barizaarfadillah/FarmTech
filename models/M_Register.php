<?php
require_once 'koneksi.php';

class RegisterModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($nama, $email, $password, $namapeternakan) {
        $sql = "INSERT INTO pemilik (nama, email, password, nama_peternakan, alamat_peternakan, foto_profil) VALUES (?, ?, ?, ?, ' ', 'default.svg')";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $params = array($nama, $email, $hashedPassword, $namapeternakan);
        $this->db->execute($sql, $params);
    }

    public function cekEmail($email) {
        $sql = "SELECT * FROM pemilik WHERE email = ?";
        $params = array($email);
        $result = $this->db->query($sql, $params);
        return count($result) > 0;
    }
}
