<?php
    // session_start(); 
    require_once 'models/M_Penjualan-Karyawan.php';

    class Penjualan {


        private $penjualanModel;
    
        public function __construct() {
            $this->penjualanModel = new PenjualanModel();
        }
    
    
        public function getRecordingPenjualan() {
            $result = $this->penjualanModel->RecordingPenjualan(); 
            return $result;
        }
        public function getRecordingPenjualanbyId() {
            $id= $_GET['id'];
            $result = $this->penjualanModel->RecordingPenjualanbyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->penjualanModel->jumlahData(); 
            return $result;
        }

        public function addRecordingPenjualan() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];
    
            $errors = $this->cekDataNull($nama, $tanggal, $jumlah, $total);
            
            if (count($errors) > 0) {
                $errors = $errors['error'];
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                swal({
                    title: '$errors',
                    icon: 'warning',
                    button: 'Oke'
                })
                </script>";
                
            } else {
                $this->penjualanModel->add($nama, $tanggal, $jumlah, $total);
            }
        }
        public function updateRecordingPenjualan() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNull($nama, $tanggal, $jumlah, $total);
            
            if (count($errors) > 0) {
                $errors = $errors['error'];
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                swal({
                    title: '$errors',
                    icon: 'warning',
                    button: 'Oke'
                })
                </script>";
                
            } else {
                $this->penjualanModel->update($id, $nama, $tanggal, $jumlah, $total);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                        swal({
                title: "Simpan ?",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: "Simpan",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Batal",
                        value: false,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    }
                }
            }).then((value) => {
                if (value) {
                    swal({
                        title: "Data tersimpan",
                        icon: "success",
                        button: "Oke",
                    }).then(() => {
                        window.location.href="?page=penjualan";
                    });
                }
            });
                </script>';
            }
        }

        private function cekDataNull($nama, $tanggal, $jumlah, $total) {
            
            $errors = array();
    
            if(empty($nama)||empty($tanggal)||empty($jumlah)||empty($total)){
                $errors['error'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteRecordingPenjualan() {
            $id= $_GET['id'];
            
            $this->penjualanModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=penjualan';
                        });
                    </script>";
            
        }

    }
?>