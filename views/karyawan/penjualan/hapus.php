<?php
require_once 'controllers/C_Penjualan-Karyawan.php';
$Penjualan = new Penjualan();

$Penjualan->deleteData();?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus");
	window.location.href="?page=penjualan";
</script>