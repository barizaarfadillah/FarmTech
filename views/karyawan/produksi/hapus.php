<?php
require_once 'controllers/C_Produksi-Karyawan.php';
$Produksi = new Produksi();

$Produksi->deleteData();?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus");
	window.location.href="?page=produksi";
</script>