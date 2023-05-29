<?php
    // session_start(); 
    require_once 'models/M_Recording.php';

    class C_Recording {

        private $produksiModel;
        private $penjualanModel;
    
        public function __construct() {
            $this->produksiModel = new M_RecordingProduksi();
            $this->penjualanModel = new M_RecordingPenjualan();
        }

        public function getStok(){
            $result = $this->produksiModel->stok(); 
            return $result;
        }

        public function addStok(){
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];

            $this->produksiModel->addStok($kode, $nama);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data Berhasil Ditambah',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=stok';
                        });
                    </script>";
        }

        public function deleteStok(){
            $kode= $_GET['id'];
            $this->produksiModel->deleteStok($kode);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                swal({
                    title: 'Data Berhasil Dihapus',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='?page=stok';
                });
            </script>";
        }
    
        public function getRecordingProduksi() {
            $result = $this->produksiModel->recordingProduksi(); 
            return $result;
        }
    
        public function getGrafikProduksi() {
            $result = $this->produksiModel->recordingProduksiGrafik(); 
            return $result;
        }

        public function getRecordingProduksibyId() {
            $id= $_GET['id'];
            $result = $this->produksiModel->recordingProduksibyId($id); 
            return $result;
        }

        public function jumlahDataProduksi() {
            $result = $this->produksiModel->jumlahData(); 
            return $result;
        }

        public function addRecordingProduksi() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
    
            $errors = $this->cekDataNullProduksi($nama, $tanggal, $jumlah);
            
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
                            title: 'Data Berhasil Ditambah',
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
    
            $errors = $this->cekDataNullProduksi($nama, $tanggal, $jumlah);
            
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
                            title: "Data Tersimpan",
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

        private function cekDataNullProduksi($nama, $tanggal, $jumlah) {
            
            $errors = array();
    
            if(empty($nama)||empty($tanggal)||empty($jumlah)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }

        public function deleteRecordingProduksi() {
            $id= $_GET['id'];
            
            $this->produksiModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                swal({
                    title: 'Data Berhasil Dihapus',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='?page=produksi';
                });
            </script>";
        }

        public function getRecordingPenjualan() {
            $result = $this->penjualanModel->recordingPenjualan(); 
            return $result;
        }
        public function getGrafikPenjualan() {
            $result = $this->penjualanModel->recordingPenjualanGrafik(); 
            return $result;
        }

        public function getRecordingPenjualanbyId() {
            $id= $_GET['id'];
            $result = $this->penjualanModel->recordingPenjualanbyId($id); 
            return $result;
        }

        public function jumlahDataPenjualan() {
            $result = $this->penjualanModel->jumlahData(); 
            return $result;
        }

        public function addRecordingPenjualan() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];
    
            $errors = $this->cekDataNullPenjualan($nama, $tanggal, $jumlah, $total);
            
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
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data Berhasil Ditambah',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=penjualan';
                        });
                    </script>";
            }
        }

        public function updateRecordingPenjualan() {
            $nama = $_POST['nama'];
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNullPenjualan($nama, $tanggal, $jumlah, $total);
            
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
                        title: "Data Tersimpan",
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

        private function cekDataNullPenjualan($nama, $tanggal, $jumlah, $total) {
            
            $errors = array();
    
            if(empty($nama)||empty($tanggal)||empty($jumlah)||empty($total)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }

        public function deleteRecordingPenjualan() {
            $id= $_GET['id'];
            
            $this->penjualanModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=penjualan';
                        });
                    </script>";
            
        }

    }


?>