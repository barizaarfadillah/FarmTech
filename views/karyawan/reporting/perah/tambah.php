<?php
require_once 'controllers/C_Reporting.php';
$Reporting = new C_Reporting();

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
                        <img src="assets/img/avatar/<?php echo $data['foto_profile'] ;?>" alt="">
                    </a>
                </div>
            </div>
        </header>
        <main>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=reportingpakan" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Tambah Reporting</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Nama Karyawan</label></br>
                                    <input name='karyawan'type="text" value="<?php echo $data['nama'];?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Hasil Produksi (liter)</label></br>
                                    <input name='hasil'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jam</label></br>
                                    <input name='jam' type="time" value="<?php date_default_timezone_set("Asia/Jakarta");  echo date("H:i:s") ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $tanggal ;?>" readonly/>
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
    $Reporting->addReportingPerah();?>
<?php }?>