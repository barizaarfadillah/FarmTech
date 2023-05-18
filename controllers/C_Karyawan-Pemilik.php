<?php
    // session_start(); 
    require_once 'models/M_Karyawan-Pemilik.php';

    class Karyawan {


        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new KaryawanModel();
        }
        
        public function getKaryawan() {
            $result = $this->karyawanModel->Karyawan(); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->karyawanModel->jumlahData(); 
            return $result;
        }

        public function addKaryawan() {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
    
            $errors = $this->cekDataNull($email, $password, $cpassword);

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
                $this->karyawanModel->add($email, $password);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil ditambahkan',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=karyawan';
                        });
                    </script>";
            }
        }

        private function cekDataNull($email, $password, $cpassword) {
            
            $errors = array();
    
            if(empty($email)||empty($password)||empty($cpassword)){
                $errors['error'] = "Data harus diisi";
            } elseif ($password != $cpassword) {
                $errors['error'] = "Password tidak sama";
            }
            
            return $errors;
        }

        public function hapus() {
            $id= $_GET['id'];
            
            $this->karyawanModel->hapus($id);
            
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data berhasil dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=karyawan';
                        });
                    </script>";
        }

    }
?>