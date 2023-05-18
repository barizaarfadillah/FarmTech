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
                    echo "<script>
                        swal({
                            title: 'Data berhasil ditambah',
                            icon: 'success',
                            button: 'Oke',
                        });
                    </script>";
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
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data tersimpan',
                            icon: 'success',
                            button: 'Oke',
                        });
                    </script>";
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