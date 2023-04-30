<?php
require_once 'controllers/C_Karyawan-Pemilik.php';
require_once 'controllers/C_Ternak-Pemilik.php';
require_once 'controllers/C_Jadwal-Pemilik.php';
require_once 'controllers/C_Penjualan-Pemilik.php';
require_once 'controllers/C_Produksi-Pemilik.php';

$Penjualan = new Penjualan();
$result = $Penjualan->getRecordingPenjualan();
$data_penjualan = array();
while ($row = $result->fetch_array()){
    $tanggal = $row['tanggal_penjualan'];
    $total = $row['total'];

    $data_penjualan[] = array('tanggal' => $tanggal, 'total' => $total);
}

$Produksi = new Produksi();
$row = $Produksi->jumlahData();
$totalProduksi = $row['total'];

$Karyawan = new Karyawan();
$row = $Karyawan->jumlahData();
$totalKaryawan = $row['total'];

$Ternak = new Ternak();
$row = $Ternak->jumlahData();
$totalTernak = $row['total'];

$Penjualan = new Penjualan();
$row = $Penjualan->jumlahData();
$totalPenjualan = $row['total'];

$Jadwal = new Jadwal();
$result = $Jadwal->getData();
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
                <span class="garis"></span>
                <a onclick="logout()" class="btn-logout">Logout</a>
            </div>
        </header>
<main>
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
                            <h4>Rp <?php echo $totalPenjualan;?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="?page=penjualan">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span>
                            <img src="assets/img/milk-bottle.svg" alt="">
                        </span>
                        <div>
                            <h5>Produksi</h5>
                            <h4><?php echo $totalProduksi;?> Produk</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="?page=produksi">View all</a>
                    </div>
                </div>
            </div>
            <section class="recent">
                <div class="activity-grid">

                   <div class="activity-card">
                        <div class="table-responsive">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
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
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
                <script>
var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach ($data_penjualan as $data) { echo "'" . $data['tanggal'] . "', "; } ?>],
        datasets: [{
            label: 'Penjualan',
            data: [<?php foreach ($data_penjualan as $data) { echo $data['total'] . ", "; } ?>],
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});                </script> 
</main>