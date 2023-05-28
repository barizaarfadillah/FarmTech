<?php
require_once 'controllers/C_Recording.php';
$Recording = new C_Recording();
$result = $Recording->getRecordingPenjualan();
?>

<header>
            <div class="toggle-sidebar">
                <div class="text"><?php echo $data['nama'] ;?></div>
            </div>
            <div class="social-icons">
                <div>
                    <a href="?page=profil">
                        <img src="assets/img/avatar/<?php echo $data['profil'] ;?>" alt="">
                    </a>
                </div>
            </div>
        </header>
<main>
<h2 class="dash-title">Data Penjualan</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-delete" href="?page=penjualan&aksi=grafik">Lihat Grafik</a>
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">No</th>
                                    <th style="width:20%; font-size: 1rem;">Nama Karyawan</th>
                                    <th style="width:20%; font-size: 1rem;">Nama Produk</th>
                                    <th style="width:20%; font-size: 1rem;">Tanggal Penjualan</th>
                                    <th style="width:20%; font-size: 1rem;">Jumlah Produk</th>
                                    <th style="width:15%; font-size: 1rem;">Total</th>
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
                                    <td style="font-size: .9rem;"><?php echo $row['nama'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['nama_produk'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['tanggal_penjualan'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['jumlah_produk'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['total'] ;?></td>
                                </tr>
                                <?php
                                 }}
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                                </main>