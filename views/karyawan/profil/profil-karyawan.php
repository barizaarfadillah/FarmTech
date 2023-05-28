<?php
require_once 'controllers/C_Karyawan.php';
$Profil = new C_ProfileKaryawan();
$data = $Profil->getKaryawan();
$_SESSION['id_karyawan'] = $data['id'];
?>

<header>
            <div class="toggle-sidebar">
                <div class="text"><?php echo $data['nama'];?></div>
            </div>
            <div class="social-icons">
                <div>
                    <a href="?page=profil">
                        <img src="assets/img/avatar/<?php echo $data['foto_profile'] ;?>" alt="">
                    </a>
                </div>
            </div>
        </header>
        <main>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Profile</h2>
                    <div class="card-bodys">
                        <div class="profile">
                            <div class="img-profile">
                                <img src="assets/img/avatar/<?php echo $data['foto_profile'] ;?>" alt="">
                            </div>
                            <div class="info-profile">
                                <label for="">Nama Lengkap</label></br>
                                <input type="text" value="<?php echo $data['nama'];?>" readonly/>
                            </div>
                            <div class="info-profile">
                                <label for="">Email</label></br>
                                <input type="text" value="<?php echo $data['email'];?>" readonly/>
                            </div>
                            <div class="info-profile">
                                <label for="">Password</label></br>
                                <input type="password" value="<?php echo $data['password'];?>" readonly/>
                            </div>
                            <div class="info-profile">
                                <label for="">Alamat</label></br>
                                <input type="text" value="<?php echo $data['alamat'];?>" readonly/>
                            </div>
                            <div class="info-profile">
                                <label for="">No Handphone</label></br>
                                <input type="text" value="<?php echo $data['no_hp'];?>" readonly/>
                            </div>
                            <div class="edit-profile">
                                <a class="btn-edit-profile" href="?page=profil&aksi=edit">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</main>