<?php
session_start();
require_once 'models/M_Pemilik.php';

class C_Register {
    private $pemilikModel;

    public function __construct() {
        $this->pemilikModel = new M_Pemilik();
    }

    // Method untuk membuat akun pemilik
    public function register() {
        $nama = $_POST['nama'];
        $namapeternakan = $_POST['namapeternakan'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $alamat = ' ';
        $profil = 'default.svg';

        // Melakukan pengecekan data null
        $errors = $this->cekDataNull($nama, $email, $password, $cpassword, $namapeternakan);
            if (empty($errors)){
                $errors = $this->cekEmailTerdaftar($email);
                if (empty($errors)){
                    $errors = $this->cekKonfirmasiPassword($password, $cpassword);
                }
            }

        if (count($errors) > 0) {
            // Jika terdapat error menampilkan pop up error
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
            // Jika tidak, program akan melakukan pembuatan akun pemilik
            $this->pemilikModel->register($nama, $email, $password, $namapeternakan, $alamat, $profil);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                    swal({
                        title: 'Registrasi Berhasil',
                        icon: 'success',
                        button: 'Oke',
                    }).then(() => {
                        window.location.href='login-pemilik.php';
                    });
                </script>";
        }
    }

    // Method untuk melakukan pengecekan data null
    private function cekDataNull($nama, $email, $password, $cpassword, $namapeternakan) {
        $errors = array();

        if(empty($nama)||empty($namapeternakan)||empty($email)||empty($password)||empty($cpassword)){
            $errors['error'] = "Data Harus Diisi";
        }
        
        return $errors;
    }

    // Method untuk melakukan pengecekan konfirmasi password
    private function cekKonfirmasiPassword($password, $cpassword) {
        $errors = array();

        if ($password !== $cpassword){
            $errors['error'] = "Password Tidak Sama";
        }
        
        return $errors;
    }

    // Method untuk melakukan pengecekan email yang terdaftar
    private function cekEmailTerdaftar($email) {
        $errors = array();

        if ($this->pemilikModel->cekEmailTerdaftar($email)){
            $errors['error'] = "Email Sudah Terdaftar";
        }
        
        return $errors;
    }
}

class C_Login {
private $pemilikModel;

    public function __construct() {
        $this->pemilikModel = new M_Pemilik();
    }

    // Method untuk melakukan login sebagai pemilik
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
            // jika terdapat error, akan menampilkan pop up error
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
            // jika tidak, program akan melakukan proses login
            $this->pemilikModel->login($email, $password);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Login Berhasil',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='pemilik.php';
                });
                </script>";
        }
    }

    // Method untuk melakukan pengecekan data null
    private function cekDataNull($email, $password) {
        $errors = array();

        if(empty($email)||empty($password)){
            $errors['error'] = "Data Harus Diisi";
        } 
        
        return $errors;
    }
    
    // Method untuk melakukan pengecekan password
    private function cekPasswordBenar($email, $password) {
        $errors = array();

        if ($this->pemilikModel->cekPasswordBenar($email, $password) == false){
            $errors['error'] = "Password Salah";
        }
        
        return $errors;
    }
    
    // Method untuk melakukan pengecekan email
    private function cekEmailTerdaftar($email) {
        $errors = array();

        if ($this->pemilikModel->cekEmailTerdaftar($email) == false){
            $errors['error'] = "Akun Tidak Terdaftar";
        }
        
        return $errors;
    }
}

class C_ProfilePemilik {
    private $pemilikModel;

    public function __construct() {
        $this->pemilikModel = new M_Pemilik();
    }

    // Method untuk mengambil data pemilik
    public function getPemilik() {
        
        return $this->pemilikModel->Pemilik();
    }

    // Method untuk mengupload foto profil
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

    // Method untuk melakukan update data pemilik
    public function updatePemilik() {
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $peternakan = $_POST['peternakan'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        $image = $this->uploadfoto();
        
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
            $this->pemilikModel->update($email, $nama, $peternakan, $alamat, $password, $image);
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

    // Method untuk pengecekan data null
    private function cekDataNull($nama, $peternakan, $alamat, $password) {
        
        $errors = array();

        if(empty($nama)||empty($peternakan)||empty($alamat)||empty($password)){
            $errors['error'] = "Data Harus Diisi";
        }
        
        return $errors;
    }
}

class C_LupaPassword {
    private $pemilikModel;

    public function __construct() {
        $this->pemilikModel = new M_Pemilik();
    }

    // Method untuk lupa password
    public function forgot(){
        $email = $_POST['email'];

        $errors = $this->cekDataNull($email);
        if (empty($errors)){
            $errors = $this->cekEmailTerdaftar($email);
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
            $_SESSION['pemilik'] = $email;
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Email Valid',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='change-password.php';
                });
                </script>";
        }
    }

    // Method untuk pengecekan data null
    private function cekDataNull($email) {
        $errors = array();

        if(empty($email)){
            $errors['error'] = "Data Harus Diisi";
        } 
        
        return $errors;
    }

    // Method untuk pengecekan validasi email
    public function cekEmailTerdaftar($email){
        $errors = array();

        if ($this->pemilikModel->cekEmailTerdaftar($email) == false){
            $errors['error'] = "Email Tidak Valid";
        }

        return $errors;
    }
}

class C_NewPassword {
    private $pemilikModel;

    public function __construct() {
        $this->pemilikModel = new M_Pemilik();
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
            $this->pemilikModel->changePass($password);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Password Telah Terganti',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='login-pemilik.php';
                });
                </script>";
        }
    }
    
    // Method untuk mengecek data
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

?>