<?php
require_once 'controllers/C_Penjualan-Karyawan.php';
$Penjualan = new Penjualan();

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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=penjualan" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Tambah Data Penjualan</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Nama Produk</label></br>
                                    <input name='nama'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Penjualan</label></br>
                                    <input name='tanggal' type="date"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jumlah Produk</label></br>
                                    <input name='jumlah'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Total</label></br>
                                    <input name='total'type="text"/>
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
    $Penjualan->addRecordingPenjualan();?>

<?php }?>