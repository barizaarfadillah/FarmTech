<?php
require_once 'controllers/C_Recording.php';
$Recording = new C_Recording();
$result = $Recording->getRecordingPenjualanbyId();
$row = $result->fetch_assoc()
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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=penjualan" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Edit Data Penjualan</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Nama Karyawan</label></br>
                                    <input name='karyawan'type="text" value="<?php echo $data['nama'];?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Produk</label></br>
                                    <input name='nama'type="text" value="<?php echo $row['nama_produk'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Penjualan</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $row['tanggal_penjualan'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jumlah Produk</label></br>
                                    <input name='jumlah'type="text" value="<?php echo $row['jumlah_produk'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Total</label></br>
                                    <input name='total'type="text" value="<?php echo $row['total'] ;?>"/>
                                </div>
                                <div class="edit-profile">
                                    <button name='edit' class="btn-add" href="#" style="border-style: none; width:65px; margin:0.5rem;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php
if(isset($_POST["edit"])) {
    $Recording->updateRecordingPenjualan();?>
<?php }?>