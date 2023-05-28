<?php
require_once 'controllers/C_Pembayaran-Pemilik.php';
$Pembayaran = new Pembayaran();
$objDateTime = date_create("now", new DateTimeZone("Asia/Jakarta"));
$tanggal = $objDateTime->format("Y-m-d");

?>
<header>
            <div class="toggle-sidebar">
                <div class="text"><?php echo $data['nama'];?></div>
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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=ternak" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Pembayaran</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <input name='id'type="hidden" value="<?php echo $data['id'];?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Pemilik</label></br>
                                    <input name='nama'type="text" value="<?php echo $data['nama'];?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Pembayaran</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $tanggal;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Metode Pembayaran</label></br>
                                    <select name="metode" id="metode">
                                        <option value="">--- Pilih Metode ---</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                    </select>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nomor Rekening</label></br>
                                    <input name='rekening' type="text"/>
                                </div>
                                <div class="edit-profile">
                                    <button name='bayar' class="btn-add" href="#" style="border-style: none;">Bayar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php
if(isset($_POST["bayar"])) {
    $Pembayaran->bayar();?>
<?php }?>