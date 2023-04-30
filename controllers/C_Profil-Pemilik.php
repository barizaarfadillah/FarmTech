<?php
    // session_start(); 
    require_once 'models/M_Profil-Pemilik.php';

    class Profil {


        private $profilModel;
    
        public function __construct() {
            $this->profilModel = new ProfilModel();
        }
    
    
        public function getPemilik() {
            
            return $this->profilModel->getPemilik();
        }

        public function simpan() {
            $email = $_POST['email'];
            $nama = $_POST['nama'];
            $peternakan = $_POST['peternakan'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];
            

            $errors = $this->cekDataNull($nama, $peternakan, $alamat, $password);
            
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
                $this->profilModel->simpan($email, $nama, $peternakan, $alamat, $password);
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

        private function cekDataNull($nama, $peternakan, $alamat, $password) {
            
            $errors = array();
    
            if(empty($nama)||empty($peternakan)||empty($alamat)||empty($password)){
                $errors['error'] = "Data harus diisi";
            }
            
            return $errors;
        }
    
    }
?>