<?php
	session_start();
	require "koneksi.php";

	$errors = array();
	
	if(isset($_POST['login'])){
		$email = mysqli_real_escape_string($koneksi, $_POST['email']);
		$password = mysqli_real_escape_string($koneksi, $_POST['password']);
		$check= "SELECT * FROM pemilik WHERE email = '$email'";
		$res = mysqli_query($koneksi, $check);
		if(mysqli_num_rows($res) > 0){
			$fetch = mysqli_fetch_assoc($res);
			$fetch_pass = $fetch['password'];
			if($fetch_pass){
				$_SESSION['pemilik'] = $fetch['nama'];
				$_SESSION['login'] = true;
				header('location: pemilik.php');
				exit;
			}else{
				$errors['pemilik'] = "Incorrect username or password!";
			}
		}else{
			$errors['pemilik'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
		}
	}
?>


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
                        <?php
               		if(count($errors) > 0){
                  		?>
                  		<div class="alert alert-danger text-center">
                    		<?php
                     		foreach($errors as $showerror){
                        		echo $showerror;
                     		}
                    		?>
                  		</div>
                  		<?php
               		}
               		?>	
                        <p>Masukkan email dan password anda</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Email" required>
                            <input type="password" class="password" name="password" placeholder="Password" style="margin-bottom: 2px;" required>
                            <p class="d-flex justify-content-end"><a href="forgot-password.php" style="margin-bottom: -5px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="login" name="login" class="btn" type="login">Login</button>
                        </form>
                        <div class="social-icons text-center">
                            <p>Buat akun! <a href="register.php">Register</a>.</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootsrap.bundle.js"></script>
</body>
</html>