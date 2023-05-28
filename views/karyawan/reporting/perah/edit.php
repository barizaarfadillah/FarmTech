<?php
require_once 'controllers/C_Reporting.php';
$Reporting = new C_Reporting();
$result = $Reporting->getReportingPerahbyId();
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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=reportingperah" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Edit Reporting</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Nama Karyawan</label></br>
                                    <input name='karyawan'type="text" value="<?php echo $row['nama'] ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Hasil Produksi (liter)</label></br>
                                    <input name='hasil'type="text" value="<?php echo $row['hasil_perah'] ;?>" />
                                </div>
                                <div class="info-profile">
                                    <label for="">Jam</label></br>
                                    <input name='jam' type="time" value="<?php echo $row['jam'] ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $row['tanggal'] ;?>" readonly/>
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
    $Reporting->updateReportingPerah();?>
<?php }?>