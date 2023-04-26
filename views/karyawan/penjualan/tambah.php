<?php
require_once 'controllers/C_Penjualan-Karyawan.php';
$Penjualan = new Penjualan();

?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Tambah Data Penjualan</h2>
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
<?php
if(isset($_POST["tambah"])) {
    $Penjualan->addData();?>
    <script>
        alert("Data berhasi ditambah")
        window.location.href="?page=penjualan";
    </script>
<?php }?>