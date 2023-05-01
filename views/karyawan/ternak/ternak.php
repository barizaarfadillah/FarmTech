<?php
require_once 'controllers/C_Ternak-Karyawan.php';
$Ternak = new Ternak();
$result = $Ternak->getData();
?>

<header>
            <div class="toggle-sidebar">
                <div class="text"><?php echo $data['nama'];?></div>
            </div>
            <div class="social-icons">
                <div>
                    <a href="?page=profil">
                        <img src="assets/img/avatar/<?php echo $data['foto_profile'] ;?>" alt="">
                    </a>
                </div>
            </div>
        </header>
        <main>
<h2 class="dash-title">Data Hewan Ternak</h2>
            <div class="dash-cardsss">
                <div class="card-singless">
                    <a class="btn-add" href="?page=ternak&aksi=tambah">Tambah Ternak</a>
                    <div class="table-responsives">
                        <table id="example" class="cell-border hover">
                            <thead style="background-color:#9DF3C4;">
                                <tr>
                                    <th style="width:5%; align-items:center; font-size: 1rem;">Id</th>
                                    <th style="width:25%; font-size: 1rem;">Jenis Ternak</th>
                                    <th style="width:25%; font-size: 1rem;">Tanggal Pendataan</th>
                                    <th style="width:25%; font-size: 1rem;">Status</th>
                                    <th style="width:15%; font-size: 1rem;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color:#D7FBE8; font-weight:500;">
                                <?php
                                    if ($result->num_rows>0) {
                                        while ($row = $result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td style="text-align: center; font-size: .9rem;"><?php echo $row['id_ternak']?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['jenis'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['tanggal_pendataan'] ;?></td>
                                    <td style="font-size: .9rem;"><?php echo $row['status'] ;?></td>
                                    <td style="text-align: center;display:flex;justify-content: center;align-items: center;">
                                        <a class="btn-add" href="?page=ternak&aksi=edit&id=<?php echo $row['id_ternak'] ?>" style="width:65px; margin:0.5rem;">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin akan memecat karyawan ini?')" class="btn-delete" style="width:65px; margin:0.5rem;" href="?page=ternak&aksi=hapus&id=<?php echo $row['id_ternak'] ?>">Hapus</a>
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
                                </main>