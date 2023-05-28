<?php
require_once 'controllers/C_HewanTernak.php';
$Ternak = new C_DataHewanTernak();
$result = $Ternak->getDataTernakbyId();
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
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;"><a href="?page=ternak" style="margin-right:1rem;"><i class='bx bx-arrow-back'></i></a> Edit Data Ternak</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Id Ternak</label></br>
                                    <input name='id'type="text" value="<?php echo $row['id_ternak'] ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jenis Ternak</label></br>
                                    <input name='jenis'type="text" value="<?php echo $row['jenis'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Pendataan</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $row['tanggal_pendataan'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Status</label></br>
                                    <select name="status" id="status">
                                        <option value="<?php echo $row['status'] ;?>"><?php echo $row['status'] ;?></option>
                                        <option value="Sehat">Sehat</option>
                                        <option value="Sakit">Sakit</option>
                                    </select>
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
    $Ternak->updateDataTernak();?>
<?php }?>