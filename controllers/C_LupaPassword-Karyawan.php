<?php
session_start();
require_once 'models/M_LupaPassword-Karyawan.php';

class Forgot {
    private $forgotModel;

    public function __construct() {
        $this->forgotModel = new ForgotModel();
    }

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

    private function cekDataNull($email) {
        $errors = array();

        if(empty($email)){
            $errors['error'] = "Data harus diisi";
        } 
        
        return $errors;
    }

    public function cekEmail($email){
        $errors = array();

        if ($this->forgotModel->cekEmail($email) == false){
            $errors['error'] = "Email tidak valid";
        }

        return $errors;
    }

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
            $this->forgotModel->changePass($password);
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                swal({
                    title: 'Reset Password Berhasil',
                    icon: 'success',
                    button: 'Oke',
                }).then(() => {
                    window.location.href='login-karyawan.php';
                });
                </script>";
        }
    }

    private function cekData($password, $cpassword) {
        $errors = array();

        if(empty($password)||empty($cpassword)){
            $errors['error'] = "Data harus diisi";
        } 
        
        return $errors;
    }
    
    private function passMatch($password, $cpassword) {
        $errors = array();

        if($password !== $cpassword){
            $errors['error'] = "Password tidak sama";
        } 
        
        return $errors;
    }

}
?>