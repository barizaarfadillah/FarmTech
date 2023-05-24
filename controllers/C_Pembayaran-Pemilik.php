<?php
    // session_start(); 
    require_once 'models/M_Pembayaran-Pemilik.php';

    class Pembayaran {


        private $pembayaranModel;
    
        public function __construct() {
            $this->pembayaranModel = new PembayaranModel();
        }

        public function addPembayaran() {
            $id = $_POST['id'];
            $tanggal = $_POST['tanggal'];
            $metode = $_POST['metode'];
            $rekening = $_POST['rekening'];
    
            $errors = $this->cekDataNull($id, $tanggal, $metode, $rekening);

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
                $this->pembayaranModel->add($id, $tanggal, $metode, $rekening);
                    $this->pembayaranModel->upgrade($id);
                    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                    swal({
                        title: 'Pembayaran Berhasil',
                                icon: 'success',
                                button: 'Oke',
                            }).then(() => {
                                window.location.href='?';
                            });
                        </script>";
                
            }
        }

        private function cekDataNull($id, $tanggal, $metode, $rekening) {
            
            $errors = array();
    
            if(empty($id)||empty($tanggal)||empty($metode)||empty($rekening)){
                $errors['error'] = "Data harus diisi";
            }
            
            return $errors;
        }
    }
?>