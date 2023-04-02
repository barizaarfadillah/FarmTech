<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-5 side-image d-flex align-items-center justify-content-center">
                    <!-------Image-------->
                    <img src="img/bro2.png" alt="">
                </div>
                <div class="col-md-7 right ">
                     <div class="input-box">
                        <header>Lupa Password</header>
                        <p>Masukkan email anda untuk melakukan verifikasi</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Email" required>
                            <button name="submit" name="submit" class="btn" type="submit">Kirim reset link</button>
                        </form>
                        <div class="social-icons text-center">
                            <p>kembali ke <a href="login.php">login</a>.</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootsrap.bundle.js"></script>
</body>
</html>