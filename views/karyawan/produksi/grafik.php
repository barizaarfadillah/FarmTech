<?php
require_once 'controllers/C_Produksi-Karyawan.php';
$Produksi = new Produksi();
$result = $Produksi->getData();
$data_penjualan = array();
while ($row = $result->fetch_array()){
    $tanggal = $row['tanggal_produksi'];
    $total = $row['jumlah_produksi'];

    $data_produksi[] = array('tanggal' => $tanggal, 'total' => $total);
}
?>

            <h2 class="dash-title">Data Produksi</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-add" href="?page=produksi">Lihat Tabel</a>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
                <script>
var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach ($data_produksi as $data) { echo "'" . $data['tanggal'] . "', "; } ?>],
        datasets: [{
            label: 'Produksi',
            data: [<?php foreach ($data_produksi as $data) { echo $data['total'] . ", "; } ?>],
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