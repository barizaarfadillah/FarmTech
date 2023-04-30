<?php
    session_start();
    require_once 'controllers/C_Dashboard-Pemilik.php';

    $Dasboard = new Dashboard();

    if(empty($_SESSION['pemilik'])){
        header("location:index.php");
    }

    $data = $Dasboard->getData();


    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmTech</title>

    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bx-menu'></i>
            <div class="logo-name">FarmTech</div>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="?" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="?" class="link submenu-title">Dashboard</a>
                    <!-- submenu links here  -->
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="?page=karyawan" class="link">
                        <i class='bx bx-user'></i>
                        <span class="name">Karyawan</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="?page=karyawan" class="link submenu-title">Karyawan</a>
                    <!-- submenu links here  -->
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="?page=ternak" class="link">
                        <i>
                            <img src="assets/img/cow.svg" alt="">
                        </i>
                        <span class="name">Data Ternak</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="?page=ternak" class="link submenu-title">Data Ternak</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-calendar'></i>
                        <span class="name">Jadwal</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Jadwal</a>
                    <a href="?page=jadwalpakan" class="link">Pakan</a>
                    <a href="?page=jadwalvitamin" class="link">Vitamin</a>
                    <a href="?page=jadwalperah" class="link">Perah</a>
                </div>
            </li>
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="?page=formulasi" class="link">
                        <i class='bx bx-calculator'></i>
                        <span class="name">Formulasi</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="?page=formulasi" class="link submenu-title">Formulasi</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Recording</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Recording</a>
                    <a href="?page=penjualan" class="link">Penjualan</a>
                    <a href="?page=produksi" class="link">Produksi</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <header>
            <div class="toggle-sidebar">
                <div class="text"><?php echo $data['nama'] ;?></div>
            </div>
            <div class="social-icons">
                <span class="bx bx-bell"></span>
                <div>
                    <a href="?page=profil">
                        <img src="assets/img/avatar/<?php echo $data['profil'] ;?>" alt="">
                    </a>
                </div>
                <span class="garis"></span>
                <a onclick="logout()" class="btn-logout">Logout</a>
            </div>
        </header>
        <main>            
            <?php
                if ($_GET['page'] == "") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/dashboard.php";
                    }
                }
                if ($_GET['page'] == "profil") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/profil/profil-pemilik.php";
                    }
                    if ($_GET['aksi'] == "edit") {
                        include "views/pemilik/profil/edit-profil.php";
                    }
                }
                if ($_GET['page'] == "karyawan") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/karyawan/karyawan.php";
                    }
                    if ($_GET['aksi'] == "tambah") {
                        include "views/pemilik/karyawan/tambah.php";
                    }
                    if ($_GET['aksi'] == "hapus") {
                        include "views/pemilik/karyawan/hapus.php";
                    }
                }
                if ($_GET['page'] == "ternak") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/ternak/ternak.php";
                    }
                }
                if ($_GET['page'] == "jadwalpakan") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/jadwal/pakan/jadwal.php";
                    }
                }
                if ($_GET['page'] == "jadwalvitamin") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/jadwal/vitamin/jadwal.php";
                    }
                }
                if ($_GET['page'] == "jadwalperah") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/jadwal/perah/jadwal.php";
                    }
                }
                if ($_GET['page'] == "formulasi") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/formulasi/formulasi.php";
                    }
                }
                if ($_GET['page'] == "penjualan") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/penjualan/penjualan.php";
                    }
                    if ($_GET['aksi'] == "grafik") {
                        include "views/pemilik/penjualan/grafik.php";
                    }
                }
                if ($_GET['page'] == "produksi") {
                    if ($_GET['aksi'] == "") {
                        include "views/pemilik/produksi/produksi.php";
                    }
                    if ($_GET['aksi'] == "grafik") {
                        include "views/pemilik/produksi/grafik.php";
                    }
                }
            ?>
        </main>
    </section>

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function logout(){
            swal({
                title: "Apakah anda ingin keluar?",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: "Iya",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "tidak",
                        value: false,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    }
                }
            }).then((value) => {
                if (value) {
                    window.location.href="logout.php";
                }
            });
        }
    </script>
    
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>

</html>