<?php
    // session_start(); 
    require_once 'models/M_Jadwal-Karyawan.php';

    class Jadwal {


        private $jadwalModel;
    
        public function __construct() {
            $this->jadwalModel = new JadwalModel();
        }
    
        public function getPenjadwalan() {
            $result = $this->jadwalModel->Penjadwalan(); 
            return $result;
        }
        public function getPenjadwalanPakan() {
            $result = $this->jadwalModel->PenjadwalanPakan(); 
            return $result;
        }
        public function getPenjadwalanVitamin() {
            $result = $this->jadwalModel->PenjadwalanVitamin(); 
            return $result;
        }
        public function getPenjadwalanPerah() {
            $result = $this->jadwalModel->PenjadwalanPerah(); 
            return $result;
        }
        public function getPenjadwalanbyId() {
            $id= $_GET['id'];
            $result = $this->jadwalModel->PenjadwalanbyId($id); 
            return $result;
        }

        public function addPenjadwalan() {
            $jenis = $_POST['jenis'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
    
            $errors = $this->cekDataNull($jenis, $jam, $tanggal);
            
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
                $this->jadwalModel->add($jenis, $jam, $tanggal);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                if($jenis == 'Jadwal Pakan'){
                    echo "<script>
                    swal({
                        title: 'Data berhasil dihapus',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='?page=jadwalpakan';
                    });
                    </script>";
                } elseif ($jenis == 'Jadwal Perah') {
                    echo "<script>
                    swal({
                        title: 'Data berhasil dihapus',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='?page=jadwalperah';
                    });
                    </script>";
                } elseif ($jenis == 'Jadwal Vitamin') {
                    echo "<script>
                    swal({
                        title: 'Data berhasil dihapus',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='?page=jadwalvitamin';
                    });
                    </script>";
                }
            }
        }
        public function updatePenjadwalan() {
            $jenis = $_POST['jenis'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNull($jenis, $jam, $tanggal);
           
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
                $this->jadwalModel->update($id, $jenis, $jam, $tanggal);
                if($jenis == 'Jadwal Pakan'){
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        window.location.href="?page=jadwalpakan";
                    });
                }
            });
                </script>';
                }else if($jenis == 'Jadwal Perah'){
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        window.location.href="?page=jadwalperah";
                    });
                }
            });
                </script>';
                }else if($jenis == 'Jadwal Vitamin'){
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        window.location.href="?page=jadwalvitamin";
                    });
                }
            });
                </script>';
                }
            }
        }

        private function cekDataNull($jenis, $jam, $tanggal) {
            
            $errors = array();
    
            if(empty($jenis)||empty($jam)||empty($tanggal)){
                $errors['error'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deletePenjadwalan() {
            $id= $_GET['id'];
            
            $this->jadwalModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil dihapus',
                            icon: 'success',
                            button: 'Oke',
                        });
                    </script>";
        }

    }
?>