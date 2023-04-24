<?php
require_once 'koneksi.php';

class LoginModel {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM pemilik WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                $_SESSION['id_pemilik'] = $row['id_pemilik'];
            }
            return true;
        } else {
            return false;
        }

    }
    
    
}

