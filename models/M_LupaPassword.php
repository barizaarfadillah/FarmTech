<?php
require_once 'koneksi.php';



class ForgotModel {
    private $conn;

    
    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connection;
    }

    
}
