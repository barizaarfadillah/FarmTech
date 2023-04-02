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
                    <img src="img/bro3.png" alt="">
                </div>
                <div class="col-md-7 right ">
                     <div class="input-box">
                        <header>Register</header>
                        <p>Silahkan lengkapi untuk melakukan registrasi</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Nama" required>
                            <input type="email" class="email" name="email" placeholder="Email" required>
                            <input type="password" class="password" name="password" placeholder="Password" required>
                            <input type="cpassword" class="cpassword" name="cpassword" placeholder="Confirm Password" required>
                        
                            <button name="submit" name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons text-center">
                            <p>Punya akun? <a href="login.php">Login</a>.</p>
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