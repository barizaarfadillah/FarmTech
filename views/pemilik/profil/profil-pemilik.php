<?php
require_once 'controllers/C_Profil-Pemilik.php';
$Profil = new Profil();
$data = $Profil->getPemilik();
$_SESSION['id_pemilik'] = $data['id'];
?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Profile</h2>
                    <div class="card-bodys">
                        <div class="profile">
                            <div class="img-profile">
                                <img src="assets/img/avatar/<?php echo $data['profil'] ;?>" alt="">
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
                                <label for="">Nama Peternakan</label></br>
                                <input type="text" value="<?php echo $data['peternakan'];?>" readonly/>
                            </div>
                            <div class="info-profile">
                                <label for="">Alamat Peternakan</label></br>
                                <input type="text" value="<?php echo $data['alamat'];?>" readonly/>
                            </div>
                            <div class="edit-profile">
                                <a class="btn-edit-profile" href="?page=profil&aksi=edit">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>