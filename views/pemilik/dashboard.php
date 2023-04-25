<?php
require_once 'controllers/C_Karyawan-Pemilik.php';
require_once 'controllers/C_Ternak-Pemilik.php';
require_once 'controllers/C_Jadwal-Pemilik.php';

$Karyawan = new Karyawan();
$row = $Karyawan->jumlahData();
$totalKaryawan = $row['total'];

$Ternak = new Ternak();
$row = $Ternak->jumlahData();
$totalTernak = $row['total'];

$Jadwal = new Jadwal();
$result = $Jadwal->getData();
?>
<h2 class="dash-title">Dashboard</h2>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="bx bx-user"></span>
                        <div>
                            <h5>Karyawan</h5>
                            <h4><?php echo $totalKaryawan;?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="?page=karyawan">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span>
                            <img src="assets/img/cow.svg" alt="">
                        </span>
                        <div>
                            <h5>Data Ternak</h5>
                            <h4><?php echo $totalTernak;?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="?page=ternak">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="bx bx-money"></span>
                        <div>
                            <h5>Penjualan</h5>
                            <h4>Rp 100.012.040</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span>
                            <img src="assets/img/milk-bottle.svg" alt="">
                        </span>
                        <div>
                            <h5>Produksi</h5>
                            <h4>50 Produk</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
            </div>
            <section class="recent">
                <div class="activity-grid">

                    <div class="summary">
                        <div class="summary-card">

                        </div>
                    </div>
                    <div class="activity-card">
                        <h3>Jadwal Hari Ini</h3>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Uraian</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result->num_rows>0) {
                                            $no = 0; 
                                            while ($row = $result->fetch_assoc()){
                                                $no += 1;
                                    ?>
                                    <tr>
                                        <td><?php echo $row['jenis'] ;?></td>
                                        <td><?php echo $row['tanggal'] ;?></td>
                                        <td><?php echo $row['jam'] ;?></td>
                                    </tr>
                                    <?php
                                    }}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>