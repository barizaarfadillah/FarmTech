<?php
require_once 'controllers/C_Produksi-Pemilik.php';
$Produksi = new Produksi();
$result = $Produksi->getData();
?>

<h2 class="dash-title">Data Produksi</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-delete" href="?page=produksi&aksi=grafik">Lihat Grafik</a>
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">No</th>
                                    <th style="width:25%; font-size: 1rem;">Nama Produk</th>
                                    <th style="width:25%; font-size: 1rem;">Tanggal Produksi</th>
                                    <th style="width:25%; font-size: 1rem;">Jumlah Produksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color:#D7FBE8; font-weight:500;">
                                <?php
                                    if ($result->num_rows>0) {
                                        $no=0;
                                        while ($row = $result->fetch_assoc()){
                                            $no+=1;
                                ?>
                                <tr>
                                    <td style="text-align: center; font-size: .9rem;"><?php echo $no?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['nama_produk'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['tanggal_produksi'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['jumlah_produksi'] ;?></td>
                                </tr>
                                <?php
                                 }}
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>