<?php
require_once 'controllers/C_Ternak-Karyawan.php';
$Ternak = new Ternak();
$result = $Ternak->getDatabyId();
$row = $result->fetch_assoc()
?>
<div class="dash-cardsss">
                <div class="card-singles">
                    <h2 class="dash-title" style="margin-top: 2rem; margin-left: 2rem;">Edit Data Ternak</h2>
                    <div class="card-bodys">
                        <div class="profile">
                                <form action="" method="post">
                                <div class="info-profile">
                                    <label for="">Id Ternak</label></br>
                                    <input name='id'type="text" value="<?php echo $row['id_ternak'] ;?>" readonly/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Jenis Ternak</label></br>
                                    <input name='jenis'type="text" value="<?php echo $row['jenis'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Tanggal Pendataan</label></br>
                                    <input name='tanggal' type="date" value="<?php echo $row['tanggal_pendataan'] ;?>"/>
                                </div>
                                <div class="info-profile">
                                    <label for="">Status</label></br>
                                    <select name="status" id="status">
                                        <option value="<?php echo $row['status'] ;?>"><?php echo $row['status'] ;?></option>
                                        <option value="sehat">Sehat</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="mati">Mati</option>
                                    </select>
                                </div>
                                <div class="edit-profile">
                                    <button name='edit' class="btn-add" href="#" style="border-style: none; width:65px; margin:0.5rem;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
if(isset($_POST["edit"])) {
    $Ternak->editData();?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
            swal({
    title: "Simpan perubahan?",
    icon: "warning",
    buttons: {
        confirm: {
            text: "Simpan",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true
        },
        cancel: {
            text: "Batal",
            value: false,
            visible: true,
            className: "btn btn-secondary",
            closeModal: true,
        }
    }
}).then((value) => {
    if (value) {
        swal({
            title: "Berhasil!",
            text: "Data berhasil diedit",
            icon: "success",
            button: "Oke",
        }).then(() => {
            window.location.href="?page=ternak";
        });
    }
});
    </script>
<?php }?>