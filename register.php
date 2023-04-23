<?php
require_once 'controllers/C_Register.php';

$Register = new Register();

if(isset($_POST["signup"])) {
  $Register->register();
}




// jika form register di-submit



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
          <div class="container main">
              <div class="row" style="box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2); background: #fff; border-radius: 10px; height: 580px; width: 900px;">
                  <div class="col-md-5 side-image d-flex align-items-center justify-content-center">
                      <img src="assets/img/bro3.png" alt="">
                  </div>
                  <div class="col-md-7 right ">
                      <div class="input-box">
                          <header>Register</header>
                          
                          <p>Silahkan lengkapi untuk melakukan registrasi</p>
                          <form action="" method="post">
                              <input type="text" class="nama" name="nama" placeholder="Nama" required>
                              <input type="text" class="namapeternakan" name="namapeternakan" placeholder="Nama Peternakan" required>
                              <input type="email" class="email" name="email" placeholder="Email" required>
                              <input type="password" class="password" name="password" placeholder="Password" required>
                              <input type="password" class="cpassword" name="cpassword" placeholder="Confirm Password" required>
                          
                              <button name="signup"  class="btn" type="submit">Register</button>
                          </form>
                          <div class="social-icons text-center">
                              <p>Punya akun? <a href="login-pemilik.php">Login</a>.</p>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/bootsrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<?php if(isset($errors)) { ?>
		<script>
			swal({
				title: "Error!",
				text: "<?php echo $errors ?>",
				icon: "error",
			});
		</script>
	<?php } ?>
</body>
</html>
          

