<?php
    // session_start(); 
    require_once 'models/M_Profil-Karyawan.php';

    class Profil {


        private $profilModel;
    
        public function __construct() {
            $this->profilModel = new ProfilModel();
        }
    
    
        public function getKaryawan() {
            
            return $this->profilModel->Karyawan();
        }

        public function uploadfoto(){
            $nama = $_POST['nama'];
            $uploadDirectory = 'assets/img/avatar/';
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];

            $uniqueName = $nama . '.jpg';

            $uploadPath = $uploadDirectory . $uniqueName;
            

            if(move_uploaded_file($fileTmpName, $uploadPath)){
                return $uniqueName;
            }
            $image = $uniqueName;

            return $image;
        }

        public function updateKaryawan() {
            $email = $_POST['email'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $password = $_POST['password'];
            $image = $this->uploadfoto();
            

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
                $this->profilModel->update($email, $nama, $alamat, $no_hp, $password, $image);
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