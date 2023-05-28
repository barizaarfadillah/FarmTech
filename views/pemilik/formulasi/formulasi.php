<?php
require_once 'controllers/C_FormulasiPakanTernak.php';
$Formulasi = new C_FormulasiPakanTernak();
$result = $Formulasi->getFormulasi();
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
<h2 class="dash-title">Formulasi Pakan Ternak</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">No</th>
                                    <th style="width:25%; font-size: 1rem;">Rentang Berat (kg)</th>
                                    <th style="width:25%; font-size: 1rem;">Nama Pakan</th>
                                    <th style="width:25%; font-size: 1rem;">Berat Pakan (kg)</th>
                                    <th style="width:25%; font-size: 1rem;">Jangka Waktu</th>
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
                                    <td style="font-size: .9rem;"><?php echo $row['rentang_berat'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['nama_pakan'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['berat_pakan'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['jangka_waktu'] ;?></td>
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