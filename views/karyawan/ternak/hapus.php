<?php
require_once 'controllers/C_Ternak-Karyawan.php';
$Ternak = new Ternak();

$Ternak->deleteData();?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus");
	window.location.href="?page=ternak";
</script>