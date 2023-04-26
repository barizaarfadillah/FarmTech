<?php

require_once 'controllers/C_Ternak-Karyawan.php';
require_once 'controllers/C_Jadwal-Karyawan.php';

$Ternak = new Ternak();
$row = $Ternak->jumlahData();
$totalTernak = $row['total'];

$Jadwal = new Jadwal();
$result = $Jadwal->getData();
?>
<h2 class="dash-title">Dashboard</h2>
            <div class="dash-cardss">
                <div class="card-single">
                    <div class="card-body">
                        <span><img src="assets/img/cow.svg" alt=""></span>
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
                        <span><img src="assets/img/milk-bottle.svg" alt=""></span>
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
                                    } }else {
                                    ?>
                                    <tr><td></td></tr>
                                    <tr>
                                        <td colspan="3" style="text-align: center; font-size: 1.3rem;"><h3>Tidak Ada Jadwal Hari Ini</h3></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>