<?php
    // session_start(); 
    require_once 'models/M_Produksi-Karyawan.php';

    class Produksi {


        private $produksiModel;
    
        public function __construct() {
            $this->produksiModel = new ProduksiModel();
        }
    
    
        public function getRecordingProduksi() {
            $result = $this->produksiModel->RecordingProduksi(); 
            return $result;
        }
        public function getRecordingProduksibyId() {
            $id= $_GET['id'];
            $result = $this->produksiModel->RecordingProduksibyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->produksiModel->jumlahData(); 
            return $result;
        }

        public function addRecordingProduksi() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
    
            $errors = $this->cekDataNull($nama, $tanggal, $jumlah);
            
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
                $this->produksiModel->add($nama, $tanggal, $jumlah);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil ditambah',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=produksi';
                        });
                    </script>";
            }
        }
        public function updateRecordingProduksi() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNull($nama, $tanggal, $jumlah);
            
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
                $this->produksiModel->update($id, $nama, $tanggal, $jumlah);
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
                            window.location.href="?page=produksi";
                        });
                    }
                });
                    </script>';
            }
            
        }

        private function cekDataNull($nama, $tanggal, $jumlah) {
            
            $errors = array();
    
            if(empty($nama)||empty($tanggal)||empty($jumlah)){
                $errors['error'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteRecordingProduksi() {
            $id= $_GET['id'];
            
            $this->produksiModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                swal({
                    title: 'Data berhasil dihapus',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='?page=produksi';
                });
            </script>";
        }

    }
?>