<?php
require_once 'controllers/C_Penjualan-Karyawan.php';
$Penjualan = new Penjualan();
$result = $Penjualan->getDatabyId();
$row = $result->fetch_assoc()
?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Edit Data Penjualan</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Id Penjualan</label></br>
                                    <input name='id'type="text" value="<?php echo $row['id_penjualan'] ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Nama Produk</label></br>
                                    <input name='nama'type="text" value="<?php echo $row['nama_produk'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Penjualan</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $row['tanggal_penjualan'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jumlah Produk</label></br>
                                    <input name='jumlah'type="text" value="<?php echo $row['jumlah_produk'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Total</label></br>
                                    <input name='total'type="text" value="<?php echo $row['total'] ;?>"/>
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
    $Penjualan->editData();?>
    <script>
        alert("Data berhasi diedit")
        window.location.href="?page=penjualan";
    </script>
<?php }?>