<?php
    // session_start(); 
    require_once 'models/M_Pembayaran-Pemilik.php';

    class Pembayaran {


        private $pembayaranModel;
    
        public function __construct() {
            $this->pembayaranModel = new PembayaranModel();
        }

        public function bayar() {
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
                    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                        swal({
                title: "Bayar senilai Rp 50.000,-",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: "Bayar",
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
                        title: "Pembayaran Berhasil",
                        icon: "success",
                        button: "Oke",
                    }).then(() => {
                        window.location.href="?";
                    });
                }
            });
                </script>';
                
            }
        }

        private function cekDataNull($id, $tanggal, $metode, $rekening) {
            
            $errors = array();
    
            if(empty($id)||empty($tanggal)||empty($metode)||empty($rekening)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }
    }
?>