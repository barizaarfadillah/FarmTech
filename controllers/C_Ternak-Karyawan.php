<?php
    // session_start(); 
    require_once 'models/M_Ternak-Karyawan.php';

    class Ternak {


        private $ternakModel;
    
        public function __construct() {
            $this->ternakModel = new TernakModel();
        }
    
    
        public function getDataTernak() {
            $result = $this->ternakModel->DataTernak(); 
            return $result;
        }
        public function getDataTernakbyId() {
            $id= $_GET['id'];
            $result = $this->ternakModel->DataTernakbyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->ternakModel->jumlahData(); 
            return $result;
        }

        public function addDataTernak() {
            $jenis = $_POST['jenis'];
            $tanggal = $_POST['tanggal'];
            $status = $_POST['status'];
    
            $errors = $this->cekDataNull($jenis, $tanggal, $status);
            
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
                $this->ternakModel->add($jenis, $tanggal, $status);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil ditambah',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=ternak';
                        });
                    </script>";
            }
        }
        public function updateDataTernak() {
            $jenis = $_POST['jenis'];
            $tanggal = $_POST['tanggal'];
            $status = $_POST['status'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNull($jenis, $tanggal, $status);
            
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
                $this->ternakModel->update($id, $jenis, $tanggal, $status);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data tersimpan',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=ternak';
                        });
                    </script>";
            }
        }

        private function cekDataNull($jenis, $tanggal, $status) {
            
            $errors = array();
    
            if(empty($jenis)||empty($tanggal)||empty($status)){
                $errors['error'] = "Data wajib diisi";
            }
            
            return $errors;
        }

        public function deleteDataTernak() {
            $id= $_GET['id'];
            
            $this->ternakModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=ternak';
                        });
                    </script>";          
        }

    }
?>