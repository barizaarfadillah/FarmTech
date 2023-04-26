<?php
require_once 'controllers/C_Formulasi-Karyawan.php';
$Formulasi = new Formulasi();

?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Tambah Formulasi</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Rentang Berat (kg)</label></br>
                                    <input name='rentang'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Pakan</label></br>
                                    <input name='nama'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Berat Pakan (kg)</label></br>
                                    <input name='berat'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jangka Waktu</label></br>
                                    <input name='jangka'type="text"/>
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
    $Formulasi->addData();?>
    <script>
        alert("Data berhasi ditambah")
        window.location.href="?page=formulasi";
    </script>
<?php }?>