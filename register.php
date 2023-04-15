<?php
	session_start();
	require "koneksi.php";

	$errors = array();
	
	if(isset($_POST["signup"])){
		$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
		$namapeternakan = mysqli_real_escape_string($koneksi, $_POST['namapeternakan']);
		$email = mysqli_real_escape_string($koneksi, $_POST['email']);
		$password = mysqli_real_escape_string($koneksi, $_POST['password']);
		$cpassword = mysqli_real_escape_string($koneksi, $_POST['cpassword']);
		if($password !== $cpassword){
		   $errors['password'] = "Confirm password not matched!";
		}
		$user_check = "SELECT * FROM pemilik WHERE nama = '$nama'";
		$res = mysqli_query($koneksi, $user_check);
		if(mysqli_num_rows($res) > 0){
		  $errors['nama'] = "Username that you have entered is already exist!";
		}
		if(count($errors) === 0){
			$insert_data = "INSERT INTO pemilik (nama, email, password, nama_peternakan, alamat_peternakan, foto_profil) values('$nama', '$email', '$password', '$namapeternakan',' ', ' ')";
			$data_check = mysqli_query($koneksi, $insert_data);
			if($data_check){
				$_SESSION['nama'] = $nama;
				$_SESSION['login'] = true;
				$_SESSION['info'] = "Berhasil Signup, silahkan login";
				header('location: login.php');
				exit();
			}else{
				$errors['db-error'] = "Failed while inserting data into database!";
			}
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
                    <img src="img/bro3.png" alt="">
                </div>
                <div class="col-md-7 right ">
                     <div class="input-box">
                        <header>Register</header>
                        <?php
               		if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                        <p>Silahkan lengkapi untuk melakukan registrasi</p>
                        <!-- echo $msg; ?> -->
                        <form action="" method="post">
                            <input type="text" class="nama" name="nama" placeholder="Nama" required>
                            <input type="text" class="namapeternakan" name="namapeternakan" placeholder="Nama Peternakan" required>
                            <input type="email" class="email" name="email" placeholder="Email" required>
                            <input type="password" class="password" name="password" placeholder="Password" required>
                            <input type="cpassword" class="cpassword" name="cpassword" placeholder="Confirm Password" required>
                        
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

    <script src="js/bootsrap.bundle.js"></script>
</body>
</html>