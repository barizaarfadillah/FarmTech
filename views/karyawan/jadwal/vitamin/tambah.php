<?php
require_once 'controllers/C_Jadwal-Karyawan.php';
$Jadwal = new Jadwal();

?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Tambah Jadwal Vitamin</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Jenis Jadwal</label></br>
                                    <input name='jenis'type="text" value="Jadwal Vitamin" readonly/>
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
                                    <button name='tambah' class="btn-add" href="#" style="border-style: none;">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
if(isset($_POST["tambah"])) {
    $Jadwal->addPenjadwalan();?>
    <script>
        window.location.href="?page=jadwalvitamin";
    </script>
<?php }?>