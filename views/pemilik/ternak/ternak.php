<?php
require_once 'controllers/C_HewanTernak.php';
$Ternak = new C_DataHewanTernak();
$result = $Ternak->getDataTernak();
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
<h2 class="dash-title">Data Hewan Ternak</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">No</th>
                                    <th style="width:30%; font-size: 1rem;">Jenis Ternak</th>
                                    <th style="width:30%; font-size: 1rem;">Tanggal Pendataan</th>
                                    <th style="width:30%; font-size: 1rem;">Status</th>
                                </tr>
                            </thead>
                            <tbody style="background-color:#D7FBE8; font-weight:500;">
                                <?php
                                    if ($result->num_rows>0) {
                                        $no = 0; 
                                        while ($row = $result->fetch_assoc()){
                                            $no += 1;
                                ?>
                                <tr>
                                    <td style="text-align: center; font-size: .9rem;"><?php echo $no?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['jenis'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['tanggal_pendataan'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['status'] ;?></td>
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