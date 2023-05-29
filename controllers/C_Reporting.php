<?php
    // session_start(); 
    require_once 'models/M_Reporting.php';

    class C_Reporting {

        private $ReportingPakanModel;
        private $ReportingPerahModel;
        private $ReportingVitaminModel;
    
        public function __construct() {
            $this->ReportingPakanModel = new M_ReportingPakan();
            $this->ReportingPerahModel = new M_ReportingPerah();
            $this->ReportingVitaminModel = new M_ReportingVitamin();
        }
    
        public function getReporting() {
            $array = $this->ReportingPakanModel->reporting(); 
            return $array;
        }

        public function getReportingPakan() {
            $result = $this->ReportingPakanModel->ReportingPakan(); 
            return $result;
        }
        public function getReportingVitamin() {
            $result = $this->ReportingVitaminModel->ReportingVitamin(); 
            return $result;
        }
        public function getReportingPerah() {
            $result = $this->ReportingPerahModel->ReportingPerah(); 
            return $result;
        }
        public function getReportingPakanbyId() {
            $id= $_GET['id'];
            $result = $this->ReportingPakanModel->ReportingbyId($id); 
            return $result;
        }
        public function getReportingPerahbyId() {
            $id= $_GET['id'];
            $result = $this->ReportingPerahModel->ReportingbyId($id); 
            return $result;
        }
        public function getReportingVitaminbyId() {
            $id= $_GET['id'];
            $result = $this->ReportingVitaminModel->ReportingbyId($id); 
            return $result;
        }
        
        public function addReportingPakan() {
            $nama = $_POST['nama'];
            $berat = $_POST['berat'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
    
            $errors = $this->cekDataNullPakan($nama, $berat, $jam, $tanggal);
            
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
                $this->ReportingPakanModel->add($nama, $berat, $jam, $tanggal);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Data Berhasil Ditambah',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='?page=reportingpakan';
                });
                </script>";
            }
        }
        
        public function addReportingPerah() {
            $hasil = $_POST['hasil'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
    
            $errors = $this->cekDataNullPerah($hasil, $jam, $tanggal);
            
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
                $this->ReportingPerahModel->add($hasil, $jam, $tanggal);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Data Berhasil Ditambah',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='?page=reportingperah';
                });
                </script>";
            }
        }
        
        public function addReportingVitamin() {
            $nama = $_POST['nama'];
            $dosis = $_POST['dosis'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
    
            $errors = $this->cekDataNullVitamin($nama, $dosis, $jam, $tanggal);
            
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
                $this->ReportingVitaminModel->add($nama, $dosis, $jam, $tanggal);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Data Berhasil Ditambah',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='?page=reportingvitamin';
                });
                </script>";
            }
        }
        
        public function updateReportingPakan() {
            $nama = $_POST['nama'];
            $berat = $_POST['berat'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNullPakan($nama, $berat, $jam, $tanggal);
           
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
                $this->ReportingPakanModel->update($id, $nama, $berat, $jam, $tanggal);
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
                        window.location.href="?page=reportingpakan";
                    });
                }
                });
                </script>';
            }
        }
        
        public function updateReportingPerah() {
            $hasil = $_POST['hasil'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNullPerah($hasil, $jam, $tanggal);
           
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
                $this->ReportingPerahModel->update($id, $hasil, $jam, $tanggal);
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
                        window.location.href="?page=reportingperah";
                    });
                }
                });
                </script>';
            }
        }
        
        public function updateReportingVitamin() {
            $nama = $_POST['nama'];
            $dosis = $_POST['dosis'];
            $jam = $_POST['jam'];
            $tanggal = $_POST['tanggal'];
            $id= $_GET['id'];
    
            $errors = $this->cekDataNullVitamin($nama, $dosis, $jam, $tanggal);
           
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
                $this->ReportingVitaminModel->update($id, $nama, $dosis, $jam, $tanggal);
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
                        window.location.href="?page=reportingvitamin";
                    });
                }
                });
                </script>';
            }
        }

        public function deleteReportingPerah() {
            $id= $_GET['id'];
            
            $this->ReportingPerahModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
            swal({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=reportingperah';
                        });
                    </script>";
        }

        public function deleteReportingVitamin() {
            $id= $_GET['id'];
            
            $this->ReportingVitaminModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
            swal({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=reportingvitamin';
                        });
                    </script>";
        }

        public function deleteReportingPakan() {
            $id= $_GET['id'];
            
            $this->ReportingPakanModel->delete($id);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
            swal({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=reportingpakan';
                        });
                    </script>";
        }

        private function cekDataNullPakan($nama, $berat, $jam, $tanggal) {
            
            $errors = array();
    
            if(empty($nama)||empty($berat)||empty($jam)||empty($tanggal)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }

        private function cekDataNullPerah($hasil, $jam, $tanggal) {
            
            $errors = array();
    
            if(empty($hasil)||empty($jam)||empty($tanggal)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }

        private function cekDataNullVitamin($nama, $dosis, $jam, $tanggal) {
            
            $errors = array();
    
            if(empty($nama)||empty($dosis)||empty($jam)||empty($tanggal)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }
        
    }
?>