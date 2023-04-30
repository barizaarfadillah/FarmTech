<?php
require_once 'controllers/C_Profil-Pemilik.php';
$Profil = new Profil();
$data = $Profil->getPemilik();
?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Profile</h2>
                    <div class="card-bodys">
                        <div class="profile">
                            <form action="" method="post">
                                <div class="img-profile">
                                    <img src="assets/img/avatar/<?php echo $data['profil'] ;?>" alt="">
                                </div>
                                <div class="btn-upload">
                                    <input type="file" name="image" accept= "image/jpg, image/jpeg, image/png"/>
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
                                    <input name= "password" type="password" value="<?php echo $data['password'];?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Peternakan</label></br>
                                    <input name= "peternakan" value="<?php echo $data['peternakan'];?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Alamat Peternakan</label></br>
                                    <input name= "alamat" type="text" value="<?php echo $data['alamat'];?>"/>
                                </div>
                                <div class="edit-profile">
                                    <button name="simpan" class="btn-edit-profile" href="#" style="border-style: none;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
if(isset($_POST["simpan"])) {
    $Profil->simpan();?>
<?php }?>