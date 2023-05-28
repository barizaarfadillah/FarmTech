<?php
require_once 'controllers/C_Karyawan.php';
$Karyawan = new C_Karyawan();

?>
<header>
            <div class="toggle-sidebar">
                <div class="text"><?php echo $data['nama'] ;?></div>
            </div>
            <div class="social-icons">
                <div>
                    <a href="?page=profil">
                        <img src="assets/img/avatar/<?php echo $data['profil'] ;?>" alt="">
                    </a>
                </div>
            </div>
        </header>
<main>
<div class="dash-cardsss">
                <div class="card-singles">
                    
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=karyawan" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Tambah Karyawan</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Email</label></br>
                                    <input name='email' type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Password</label></br>
                                    <input name='password' type="password"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Confirm Password</label></br>
                                    <input name='cpassword' type="password"/>
                                </div>
                                <div class="edit-profile">
                                    <button name='tambah' class="btn-add" href="#" style="border-style: none;">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php
if(isset($_POST["tambah"])) {
    $Karyawan->addKaryawan();?>
<?php }?>