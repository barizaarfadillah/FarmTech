<?php
require_once 'controllers/C_Karyawan.php';

$Login = new C_Login();



mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmTech</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth_style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row" style="box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2); background: #fff; border-radius: 10px; height: 580px; width: 900px;">
                <div class="col-md-5 side-image d-flex align-items-center justify-content-center">
                    <!-------Image-------->
                    <img src="assets/img/bro.png" alt="">
                </div>
                <div class="col-md-7 right ">
                     <div class="input-box">
                        <header>Login</header>
                        <p>Masukkan email dan password anda</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Email">
                            <input type="password" class="password" name="password" placeholder="Password" style="margin-bottom: 2px;">
                            <p class="d-flex justify-content-end"><a href="forgot-password-karyawan.php" style="margin-bottom: -5px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="login" name="login" class="btn" type="login">Login</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootsrap.bundle.js"></script>
    <?php
if(isset($_POST["login"])) {
    $Login->login();
  }
    ?>
</body>
</html>