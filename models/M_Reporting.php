<?php
require_once 'koneksi.php';

class M_ReportingPakan {
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

    public function reporting() {
        if($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
        } else {
            $pemilik = $this->Pemilik();
        }
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

    public function reportingPakan() {
        if($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
        } else {
            $pemilik = $this->Pemilik();
        }
        $stmt = $this->conn->prepare("SELECT reporting_pakan.id, reporting_pakan.nama_pakan, reporting_pakan.berat_pakan, reporting_pakan.jam, reporting_pakan.tanggal, karyawan.nama FROM karyawan JOIN reporting_pakan ON karyawan.id_karyawan = reporting_pakan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function reportingbyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT reporting_pakan.id, reporting_pakan.nama_pakan, reporting_pakan.berat_pakan, reporting_pakan.jam, reporting_pakan.tanggal, karyawan.nama FROM karyawan JOIN reporting_pakan ON karyawan.id_karyawan = reporting_pakan.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND reporting_pakan.id = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($nama, $berat, $jam, $tanggal) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $namaKaryawan = $row['nama'];
        $stmt = $this->conn->prepare("INSERT INTO reporting_pakan (nama_pakan, berat_pakan, jam, tanggal, uraian, karyawan_id_karyawan) VALUES ('$nama', '$berat', '$jam', '$tanggal', '$namaKaryawan memberi makan ternak', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $nama, $berat, $jam, $tanggal) {
        $stmt = $this->conn->prepare("UPDATE reporting_pakan SET nama_pakan = '$nama', berat_pakan = '$berat', tanggal = '$tanggal', jam = '$jam' WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM reporting_pakan WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    
}

class M_ReportingPerah {
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

    public function reportingPerah() {
        if($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
        } else {
            $pemilik = $this->Pemilik();
        }
        $stmt = $this->conn->prepare("SELECT reporting_perah.id, reporting_perah.hasil_perah, reporting_perah.jam, reporting_perah.tanggal, karyawan.nama FROM karyawan JOIN reporting_perah ON karyawan.id_karyawan = reporting_perah.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function reportingbyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT reporting_perah.id, reporting_perah.hasil_perah, reporting_perah.jam, reporting_perah.tanggal, karyawan.nama FROM karyawan JOIN reporting_perah ON karyawan.id_karyawan = reporting_perah.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND reporting_perah.id = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($hasil, $jam, $tanggal) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $namaKaryawan = $row['nama'];
        $stmt = $this->conn->prepare("INSERT INTO reporting_perah (hasil_perah, jam, tanggal, uraian, karyawan_id_karyawan) VALUES ('$hasil', '$jam', '$tanggal', '$namaKaryawan memerah susu', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $hasil, $jam, $tanggal) {
        $stmt = $this->conn->prepare("UPDATE reporting_perah SET hasil_perah = '$hasil', tanggal = '$tanggal', jam = '$jam' WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM reporting_perah WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    
}

class M_ReportingVitamin {
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

    public function reportingVitamin() {
        if($_SESSION['karyawan']){
            $row = $this->Karyawan();
            $karyawan = $row['id_karyawan'];
            $pemilik = $row['pemilik_id_pemilik'];
        } else {
            $pemilik = $this->Pemilik();
        }
        $stmt = $this->conn->prepare("SELECT reporting_vitamin.id, reporting_vitamin.nama_vitamin, reporting_vitamin.dosis_vitamin, reporting_vitamin.jam, reporting_vitamin.tanggal, karyawan.nama FROM karyawan JOIN reporting_vitamin ON karyawan.id_karyawan = reporting_vitamin.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function reportingbyId($id) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $pemilik = $row['pemilik_id_pemilik'];
        $stmt = $this->conn->prepare("SELECT reporting_vitamin.id, reporting_vitamin.nama_vitamin, reporting_vitamin.dosis_vitamin, reporting_vitamin.jam, reporting_vitamin.tanggal, karyawan.nama FROM karyawan JOIN reporting_vitamin ON karyawan.id_karyawan = reporting_vitamin.karyawan_id_karyawan WHERE karyawan.pemilik_id_pemilik = '$pemilik' AND reporting_vitamin.id = '$id'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function add($nama, $dosis, $jam, $tanggal) {
        $row = $this->Karyawan();
        $karyawan = $row['id_karyawan'];
        $namaKaryawan = $row['nama'];
        $stmt = $this->conn->prepare("INSERT INTO reporting_vitamin (nama_vitamin, dosis_vitamin, jam, tanggal, uraian, karyawan_id_karyawan) VALUES ('$nama', '$dosis', '$jam', '$tanggal', '$namaKaryawan memberi vitamin ternak', '$karyawan')");
        $stmt->execute();
        $stmt->close();
    }
    public function update($id, $nama, $dosis, $jam, $tanggal) {
        $stmt = $this->conn->prepare("UPDATE reporting_vitamin SET nama_vitamin = '$nama', dosis_vitamin = '$dosis', tanggal = '$tanggal', jam = '$jam' WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM reporting_vitamin WHERE id = '$id'");
        $stmt->execute();
        $stmt->close();
    }

    
}

