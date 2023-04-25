<?php
require_once 'controllers/C_Jadwal-Karyawan.php';
$Jadwal = new Jadwal();

$Jadwal->deleteData();?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus");
	window.location.href="?page=jadwalvitamin";
</script>