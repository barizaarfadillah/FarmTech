<?php
require_once 'controllers/C_Karyawan-Pemilik.php';
$Karyawan = new Karyawan();

$Karyawan->deleteData();?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus");
	window.location.href="?page=karyawan";
</script>