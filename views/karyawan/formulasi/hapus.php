<?php
require_once 'controllers/C_Formulasi-Karyawan.php';
$Formulasi = new Formulasi();

$Formulasi->deleteData();?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus");
	window.location.href="?page=formulasi";
</script>