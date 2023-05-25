<?php
// session_start();
require_once 'koneksi.php';

class ReportingPakanModel {
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

    public function reporting() {
        $pemilik = $this->Pemilik();
        $objDateTime = date_create("now", new DateTimeZone("Asia/Jakarta"));
        $tanggal = $objDateTime->format("Y-m-d");
        $stmt = $this->conn->prepare("SELECT reporting_pakan.uraian, reporting_pakan.jam, reporting_pakan.tanggal FROM karyawan
        JOIN reporting_pakan ON karyawan.id_karyawan = reporting_pakan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND reporting_pakan.tanggal = '$tanggal'");
        $stmt->execute();
        $result = $stmt->get_result();
        $array = array();
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()){
                $array[] = $row;
            }
        }
        $stmt = $this->conn->prepare("SELECT reporting_perah.uraian, reporting_perah.jam, reporting_perah.tanggal FROM karyawan
        JOIN reporting_perah ON karyawan.id_karyawan = reporting_perah.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND reporting_perah.tanggal = '$tanggal'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()){
                $array[] = $row;
            }
        }
        $stmt = $this->conn->prepare("SELECT reporting_vitamin.uraian, reporting_vitamin.jam, reporting_vitamin.tanggal FROM karyawan
        JOIN reporting_vitamin ON karyawan.id_karyawan = reporting_vitamin.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND reporting_vitamin.tanggal = '$tanggal'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()){
                $array[] = $row;
            }
        }
        return $array;
    }

    public function ReportingPakan() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT reporting_pakan.id, reporting_pakan.nama_pakan, reporting_pakan.berat_pakan, reporting_pakan.jam, reporting_pakan.tanggal, karyawan.nama FROM karyawan JOIN reporting_pakan ON karyawan.id_karyawan = reporting_pakan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

class ReportingPerahModel {
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

    public function ReportingPerah() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT reporting_perah.id, reporting_perah.hasil_perah, reporting_perah.jam, reporting_perah.tanggal, karyawan.nama FROM karyawan JOIN reporting_perah ON karyawan.id_karyawan = reporting_perah.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

class ReportingVitaminModel {
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

    public function ReportingVitamin() {
        $pemilik = $this->Pemilik();
        $stmt = $this->conn->prepare("SELECT reporting_vitamin.id, reporting_vitamin.nama_vitamin, reporting_vitamin.dosis_vitamin, reporting_vitamin.jam, reporting_vitamin.tanggal, karyawan.nama FROM karyawan JOIN reporting_vitamin ON karyawan.id_karyawan = reporting_vitamin.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

