<?php
require_once 'controllers/C_Penjualan-Pemilik.php';
$Penjualan = new Penjualan();
$result = $Penjualan->getData();
$data_penjualan = array();
while ($row = $result->fetch_array()){
    $tanggal = $row['tanggal_penjualan'];
    $total = $row['total'];

    $data_penjualan[] = array('tanggal' => $tanggal, 'total' => $total);
}
?>

            <h2 class="dash-title">Data Penjualan</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-add" href="?page=penjualan">Lihat Tabel</a>
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