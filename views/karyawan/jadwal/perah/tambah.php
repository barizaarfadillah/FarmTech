<?php
require_once 'controllers/C_Jadwal-Karyawan.php';
$Jadwal = new Jadwal();

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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=jadwalperah" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Tambah Jadwal Perah</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Jenis Jadwal</label></br>
                                    <input name='jenis'type="text" value="Jadwal Perah" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jam</label></br>
                                    <input name='jam' type="time"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal</label></br>
                                    <input name='tanggal' type="date"/>
                                </div>
                                
                                <div class="edit-profile">
                                    <button name='tambah' class="btn-add" href="#" style="border-style: none;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php
if(isset($_POST["tambah"])) {
    $Jadwal->addPenjadwalan();?>
<?php }?>