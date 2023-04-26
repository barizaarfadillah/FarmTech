<?php
require_once 'controllers/C_Formulasi-Karyawan.php';
$Formulasi = new Formulasi();
$result = $Formulasi->getDatabyId();
$row = $result->fetch_assoc()
?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Edit Formulasi</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Rentang Berat (kg)</label></br>
                                    <input name='rentang'type="text" value="<?php echo $row['rentang_berat'] ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Pakan</label></br>
                                    <input name='nama'type="text" value="<?php echo $row['nama_pakan'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Berat Pakan (kg)</label></br>
                                    <input name='berat'type="text" value="<?php echo $row['berat_pakan'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jangka Waktu</label></br>
                                    <input name='jangka'type="text" value="<?php echo $row['jangka_waktu'] ;?>"/>
                                </div>
                                <div class="edit-profile">
                                    <button name='edit' class="btn-add" href="#" style="border-style: none; width:65px; margin:0.5rem;">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
if(isset($_POST["edit"])) {
    $Formulasi->editData();?>
    <script>
        alert("Data berhasi diedit")
        window.location.href="?page=formulasi";
    </script>
<?php }?>