<?php
    // session_start(); 
    require_once 'models/M_Profil-Karyawan.php';

    class Profil {


        private $profilModel;
    
        public function __construct() {
            $this->profilModel = new ProfilModel();
        }
    
    
        public function getKaryawan() {
            
            return $this->profilModel->getKaryawan();
        }

        public function simpan() {
            $email = $_POST['email'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $password = $_POST['password'];
            

            $errors = $this->cekDataNull($nama, $alamat, $no_hp, $password);
            
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
                $this->profilModel->simpan($email, $nama, $alamat, $no_hp, $password);
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
                            window.location.href="?page=profil";
                        });
                    }
                });
                    </script>';
            }
        }

        private function cekDataNull($nama, $alamat, $no_hp, $password) {
            
            $errors = array();
    
            if(empty($nama)||empty($alamat)||empty($no_hp)||empty($password)){
                $errors['error'] = "Data harus diisi";
            }
            
            return $errors;
        }
    
    }
?>