<?php
require_once 'controllers/C_Karyawan-Pemilik.php';
$Karyawan = new Karyawan();
$result = $Karyawan->getData();
?>

<h2 class="dash-title">Data Karyawan</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-add" href="?page=karyawan&aksi=tambah">Tambah Karyawan</a>
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">No</th>
                                    <th style="width:25%; font-size: 1rem;">Nama</th>
                                    <th style="width:25%; font-size: 1rem;">Alamat</th>
                                    <th style="width:20%; font-size: 1rem;">Email</th>
                                    <th style="width:15%; font-size: 1rem;">No Handphone</th>
                                    <th style="width:10%; font-size: 1rem;">Aksi</th>
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
                                    <td style="font-size: .9rem;"><?php echo $row['nama'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['alamat'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['email'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['no_hp'] ;?></td>
                                    <td style="text-align: center;display:flex;justify-content: center;align-items: center;"><a style="width:65px; margin:0.5rem;"onclick="return confirm('Apakah anda yakin akan memecat karyawan ini?')" class="btn-delete" href="?page=karyawan&aksi=hapus&id=<?php echo $row['id_karyawan'] ?>">Pecat</a></td>
                                </tr>
                                <?php }}?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>