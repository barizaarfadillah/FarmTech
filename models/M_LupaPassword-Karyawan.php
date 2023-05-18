<?php
require_once 'koneksi.php';

class ForgotModel {
    private $conn;
    
    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    public function cekEmail($email){
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

    public function changePass($password){
        $email = $_SESSION['karyawan'];
        $stmt = $this->conn->prepare("UPDATE karyawan SET password = '$password' WHERE email = '$email'");
        $stmt->execute();
        $stmt->close();
    }
    
    
}
