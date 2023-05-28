<?php
require_once 'controllers/C_Karyawan.php';
require_once 'controllers/C_HewanTernak.php';
require_once 'controllers/C_Reporting.php';
require_once 'controllers/C_Recording.php';

$Recording = new C_Recording();
$result = $Recording->getGrafikPenjualan();
$data_penjualan = array();
while ($row = $result->fetch_array()){
    $tanggal = $row['tanggal_penjualan'];
    $total = $row['total'];

    $data_penjualan[] = array('tanggal' => $tanggal, 'total' => $total);
}

$row = $Recording->jumlahDataProduksi();
$totalProduksi = $row['total'];

$row = $Recording->jumlahDataPenjualan();
$totalPenjualan = $row['total'];

$Karyawan = new C_Karyawan();
$row = $Karyawan->jumlahData();
$totalKaryawan = $row['total'];

$Ternak = new C_DataHewanTernak();
$row = $Ternak->jumlahData();
$totalTernak = $row['total'];


$Reporting = new C_Reporting();
$array = $Reporting->getReporting();

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
                <a onclick="upgrade()" class="btn-upgrade" style="cursor: pointer; margin-left: 20px;">Upgrade</a>
                <span class="garis"></span>
                <a onclick="logout()" class="btn-logout" style="cursor: pointer;">Logout</a>
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
                        <h3>Aktifitas Hari Ini</h3>
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
                                        if (count($array)>0) {
                                            for($i=0; $i<count($array); $i++){
                                    ?>
                                    <tr>
                                        <td><?php echo $array[$i]['uraian'] ;?></td>
                                        <td><?php echo $array[$i]['tanggal'] ;?></td>
                                        <td><?php echo $array[$i]['jam'] ;?></td>
                                    </tr>
                                    <?php
                                    } }else {
                                    ?>
                                    <tr><td></td></tr>
                                    <tr>
                                        <td colspan="3" style="text-align: center; font-size: 1.3rem;"><h3>Tidak Ada Aktifitas Hari Ini</h3></td>
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

