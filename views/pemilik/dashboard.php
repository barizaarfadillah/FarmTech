<?php
require_once 'controllers/C_Karyawan-Pemilik.php';
$Karyawan = new Karyawan();
$row = $Karyawan->jumlahData();
$total = $row['total']
?>
<h2 class="dash-title">Dashboard</h2>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="bx bx-user"></span>
                        <div>
                            <h5>Karyawan</h5>
                            <h4><?php echo $total;?></h4>
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
                            <h4>150</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
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
                                    <tr>
                                        <td>Pemberian Pakan</td>
                                        <td>11 April 2023</td>
                                        <td>03:00 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Pemberian Pakan</td>
                                        <td>11 April 2023</td>
                                        <td>15:00 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Memerah Susu</td>
                                        <td>11 April 2023</td>
                                        <td>20:00 WIB</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>