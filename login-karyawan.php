<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmTech</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/auth_style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row" style="box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2); background: #fff; border-radius: 10px; height: 580px; width: 900px;">
                <div class="col-md-5 side-image d-flex align-items-center justify-content-center">
                    <!-------Image-------->
                    <img src="img/bro.png" alt="">
                </div>
                <div class="col-md-7 right ">
                     <div class="input-box">
                        <header>Login</header>
                        <p>Masukkan email dan password anda</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Email" required>
                            <input type="password" class="password" name="password" placeholder="Password" style="margin-bottom: 2px;" required>
                            <p class="d-flex justify-content-end"><a href="forgot-password.php" style="margin-bottom: -5px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="submit" name="submit" class="btn" type="submit"><a href="karyawan.php">Login</a></button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootsrap.bundle.js"></script>
</body>
</html>