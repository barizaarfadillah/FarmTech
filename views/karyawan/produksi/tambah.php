<?php
require_once 'controllers/C_Produksi-Karyawan.php';
$Produksi = new Produksi();

?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Tambah Data Produksi</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Nama Produk</label></br>
                                    <input name='nama'type="text"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Produksi</label></br>
                                    <input name='tanggal' type="date"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jumlah Produk</label></br>
                                    <input name='jumlah'type="text"/>
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
    $Produksi->addData();?>
    <script>
        alert("Data berhasil ditambah")
        window.location.href="?page=produksi";
    </script>
<?php }?>