<?php
    require_once 'models/M_Formulasi.php';

    class C_FormulasiPakanTernak {

        private $formulasiModel;
    
        public function __construct() {
            $this->formulasiModel = new M_Formulasi();
        }
    
        public function getFormulasi() {
            $result = $this->formulasiModel->Formulasi(); 
            return $result;
        }
        public function getFormulasibyId() {
            $id= $_GET['id'];
            $result = $this->formulasiModel->FormulasibyId($id); 
            return $result;
        }
        public function jumlahData() {
            $result = $this->formulasiModel->jumlahData(); 
            return $result;
        }

        public function addFormulasi() {
            $rentang = $_POST['rentang'];
            $nama = $_POST['nama'];
            $berat = $_POST['berat'];
            $jangka = $_POST['jangka'];
    
            $errors = $this->cekDataNull($rentang, $nama, $berat, $jangka);
            
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
                $this->formulasiModel->add($rentang, $nama, $berat, $jangka);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data Berhasil Ditambah',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=formulasi';
                        });
                    </script>";
            }
        }
        public function updateFormulasi() {
            $rentang = $_POST['rentang'];
            $nama = $_POST['nama'];
            $berat = $_POST['berat'];
            $jangka = $_POST['jangka'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNull($rentang, $nama, $berat, $jangka);
            
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
                $this->formulasiModel->update($id, $rentang, $nama, $berat, $jangka);
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
                        title: "Data Tersimpan",
                        icon: "success",
                        button: "Oke",
                    }).then(() => {
                        window.location.href="?page=formulasi";
                    });
                }
            });
                </script>';
            }
        }

        private function cekDataNull($rentang, $nama, $berat, $jangka) {
            
            $errors = array();
    
            if(empty($rentang)||empty($nama)||empty($berat)||empty($jangka)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }

        public function deleteFormulasi() {
            $id= $_GET['id'];
            
            $this->formulasiModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=formulasi';
                        });
                    </script>";
        }

    }
?>