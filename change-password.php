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
                        <header>Ganti Password</header>
                        <p>Masukkan password baru anda</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="password" class="password" name="password" placeholder="Password" required>
                            <input type="cpassword" class="cpassword" name="cpassword" placeholder="Confirm Password" required>
                            <button name="submit" name="submit" class="btn" type="submit">Ganti Password</button>
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