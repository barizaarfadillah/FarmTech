<?php
require_once 'controllers/C_Karyawan.php';

$Forgot = new C_LupaPassword();



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
                    <img src="assets/img/bro2.png" alt="">
                </div>
                <div class="col-md-7 right ">
                     <div class="input-box">
                        <header>Lupa Password</header>
                        <p>Masukkan email anda untuk melakukan verifikasi</p>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Email" required>
                            <button name="submit" class="btn" type="submit">Reset Password</button>
                        </form>
                        <div class="social-icons text-center">
                            <p>kembali ke <a href="index.php">login</a>.</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootsrap.bundle.js"></script>
</body>
</html>
<?php
if(isset($_POST["submit"])) {
    $Forgot->forgot();
  }
?>