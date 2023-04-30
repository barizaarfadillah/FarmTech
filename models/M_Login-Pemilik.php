<?php
require_once 'koneksi.php';

class LoginModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function login($email, $password) {
        if ($this->cekEmailTerdaftar($email) == true) {
            if ($this->cekPasswordBenar($email, $password) == true){
                $_SESSION['pemilik'] = $email;       
            }
        }
    }

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
    
}

