<?php
    session_start();
    require_once 'models/M_Karyawan.php';

    class C_Login {
        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new M_Karyawan();
        }

        // Method untuk melakukan login sebagai karyawan
        public function login() {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Melakukan pengecekan data
            $errors = $this->cekDataNull($email, $password);
            if (empty($errors)){
                $errors = $this->cekEmailTerdaftar($email);
                if (empty($errors)){
                    $errors = $this->cekPasswordBenar($email, $password);
                }
            }
        
            if (count($errors) > 0) {
                // Jika terdapat error, maka akan menampilkan pop up error
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
                // Jika tidak, program akan melakukan proses login
                $this->karyawanModel->login($email, $password);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                    swal({
                        title: 'Login Berhasil',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='karyawan.php';
                    });
                    </script>";
            }
        }

        // Method untuk mengecek data null
        private function cekDataNull($email, $password) {
            $errors = array();
    
            if(empty($email)||empty($password)){
                $errors['error'] = "Data Harus Diisi";
            } 
            
            return $errors;
        }
        
        // Method untuk mengecek password
        private function cekPasswordBenar($email, $password) {
            $errors = array();
    
            if ($this->karyawanModel->cekPasswordBenar($email, $password) == false){
                $errors['error'] = "Password Salah";
            }
            
            return $errors;
        }

        // Method untuk mengecek email
        private function cekEmailTerdaftar($email) {
            $errors = array();
    
            if ($this->karyawanModel->cekEmailTerdaftar($email) == false){
                $errors['error'] = "Akun tidak terdaftar";
            }
            
            return $errors;
        }
    }

    class C_ProfileKaryawan {
        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new M_Karyawan();
        }
    
        // Method untuk mengambil data karyawan
        public function getKaryawan() {
            
            return $this->karyawanModel->Karyawan();
        }

        // Method untuk mengupload foto profile
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

        // Method untuk mengupdate data karyawan
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
                $this->karyawanModel->update($email, $nama, $alamat, $no_hp, $password, $image);
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
                            title: "Data Tersimpan",
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

        // Method untuk mengecek data null
        private function cekDataNull($nama, $alamat, $no_hp, $password) {
            
            $errors = array();
    
            if(empty($nama)||empty($alamat)||empty($no_hp)||empty($password)){
                $errors['error'] = "Data Harus Diisi";
            }
            
            return $errors;
        }
    }

    class C_LupaPassword {
        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new M_Karyawan();
        }
    
        // Method untuk lupa password
        public function forgot(){
            $email = $_POST['email'];
    
            $errors = $this->cekDataNull($email);
            if (empty($errors)){
                $errors = $this->cekEmail($email);
            }
    
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
                $_SESSION['karyawan'] = $email;
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                    swal({
                        title: 'Email Valid',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='change-password-karyawan.php';
                    });
                    </script>";
            }
        }
    
        // Method untuk mengecek data null
        private function cekDataNull($email) {
            $errors = array();
    
            if(empty($email)){
                $errors['error'] = "Data Harus Diisi";
            } 
            
            return $errors;
        }
    
        // Method untuk mengecek email
        public function cekEmail($email){
            $errors = array();
    
            if ($this->karyawanModel->cekEmailTerdaftar($email) == false){
                $errors['error'] = "Email Tidak Valid";
            }
    
            return $errors;
        }
    }

    class C_NewPassword {
        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new M_Karyawan();
        }
    
        // Method untuk membuat password baru
        public function change(){
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
    
            $errors = $this->cekData($password, $cpassword);
            if (empty($errors)){
                $errors = $this->passMatch($password, $cpassword);
            }
    
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
                $this->karyawanModel->changePass($password);
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                    swal({
                        title: 'Password Telah Terganti',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='login-karyawan.php';
                    });
                    </script>";
            }
        }
    
        // Method untuk mengecek data null
        private function cekData($password, $cpassword) {
            $errors = array();
    
            if(empty($password)||empty($cpassword)){
                $errors['error'] = "Data Harus Diisi";
            } 
            
            return $errors;
        }
        
        // Method untuk mengecek kesamaan password
        private function passMatch($password, $cpassword) {
            $errors = array();
    
            if($password !== $cpassword){
                $errors['error'] = "Password Tidak Sama";
            } 
            
            return $errors;
        }
    }

    class C_Karyawan {
        private $karyawanModel;
    
        public function __construct() {
            $this->karyawanModel = new M_Karyawan();
        }
        
        // Method untuk mengambil data karyawan
        public function getKaryawan() {
            $result = $this->karyawanModel->getKaryawan(); 
            return $result;
        }

        // Method untuk melihat jumlah data karyawan
        public function jumlahData() {
            $result = $this->karyawanModel->jumlahData(); 
            return $result;
        }

        // Method untuk menambahkan data karyawan
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
                            title: 'Data Berhasil Ditambahkan',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=karyawan';
                        });
                    </script>";
            }
        }

        // Method untuk mengecek data null
        private function cekDataNull($email, $password, $cpassword) {
            
            $errors = array();
    
            if(empty($email)||empty($password)||empty($cpassword)){
                $errors['error'] = "Data Harus Diisi";
            } elseif ($password != $cpassword) {
                $errors['error'] = "Password Tidak Sama";
            }
            
            return $errors;
        }

        // Method untuk menghapus data karyawan
        public function hapus() {
            $id= $_GET['id'];
            
            $this->karyawanModel->hapus($id);
            
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                        swal({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            button: 'Oke',
                        }).then(() => {
                            window.location.href='?page=karyawan';
                        });
                    </script>";
        }
    }
?>