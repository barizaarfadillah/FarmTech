<?php
require_once 'controllers/C_Jadwal-Karyawan.php';
$Jadwal = new Jadwal();
$result = $Jadwal->getDataVitamin();
?>

<h2 class="dash-title">Jadwal Pemberian Vitamin</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-add" href="?page=jadwalvitamin&aksi=tambah">Tambah Jadwal</a>
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">No</th>
                                    <th style="width:25%; font-size: 1rem;">Jenis Jadwal</th>
                                    <th style="width:25%; font-size: 1rem;">Jam</th>
                                    <th style="width:25%; font-size: 1rem;">Tanggal</th>
                                    <th style="width:15%; font-size: 1rem;">Aksi</th>
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
                                    <td style="font-size: .9rem;"><?php echo $row['jam'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['tanggal'] ;?></td>
                                    <td style="text-align: center;display:flex;justify-content: center;align-items: center;">
                                        <a class="btn-add" href="?page=jadwalvitamin&aksi=edit&id=<?php echo $row['id_jadwal'] ;?>" style="width:65px; margin:0.5rem;">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus jadwal ini?')" class="btn-delete" style="width:65px; margin:0.5rem;" href="?page=jadwalvitamin&aksi=hapus&id=<?php echo $row['id_jadwal'] ?>">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                 }}
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>