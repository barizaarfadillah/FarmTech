<?php
class Connection {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "farmtech";
    private $conn;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

        if($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }
    }
}