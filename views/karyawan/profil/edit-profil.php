<?php
require_once 'controllers/C_Karyawan.php';
$Profil = new C_ProfileKaryawan();
$data = $Profil->getKaryawan();
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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=profil" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Profil</h2>
                    <div class="card-bodys">
                        <div class="profile">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="img-profile">
                                    <img src="assets/img/avatar/<?php echo $data['foto_profile'] ;?>" alt="">
                                </div>
                                <div class="btn-upload">
                                    <input type="file" name="image" accept="image/jpeg"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Lengkap</label></br>
                                    <input name= "nama" type="text" value="<?php echo $data['nama'];?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Email</label></br>
                                    <input name= "email" type="text" value="<?php echo $data['email'];?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Password</label></br>
                                    <input name= "password" type="password" value="<?php echo $data['password'];?>" />
                                </div>
                                <div class="info-profile">
                                    <label for="">Alamat</label></br>
                                    <input name= "alamat" type="text" value="<?php echo $data['alamat'];?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">No Handphone</label></br>
                                    <input name= "no_hp" value="<?php echo $data['no_hp'];?>"/>
                                </div>
                                <div class="edit-profile">
                                    <button name="simpan" class="btn-edit-profile" href="#" style="border-style: none;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php
if(isset($_POST["simpan"])) {
    $Profil->updateKaryawan();
?>  

<?php
}
?>