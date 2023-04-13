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
    <link rel="stylesheet" href="css/dashboard_style.css">
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
                    <a href="#" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Dashboard</a>
                    <!-- submenu links here  -->
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-folder'></i>
                        <span class="name">Data Ternak</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Data Ternak</a>
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
                    <a href="#" class="link">Pakan</a>
                    <a href="#" class="link">Vitamin</a>
                    <a href="#" class="link">Perah</a>
                </div>
            </li>
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-calculator'></i>
                        <span class="name">Formulasi</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Formulasi</a>
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
                    <a href="#" class="link">Penjualan</a>
                    <a href="#" class="link">Produksi</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <header>
            <div class="toggle-sidebar">
                <div class="text">Nama Peternakan</div>
            </div>
            <div class="social-icons">
                <span class="bx bx-bell"></span>
                <div>
                    <img src="img/image1.jpg" alt="">
                </div>
                <span class="garis"></span>
                <a onclick="return confirm('Apakah anda yakin akan logout?')" class="btn-logout" href="landing-page.php">Logout</a>
            </div>
        </header>
        <main>
            <h2 class="dash-title">Dashboard</h2>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="bx bx-folder"></span>
                        <div>
                            <h5>Data Ternak</h5>
                            <h4>150</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="bx bx-money"></span>
                        <div>
                            <h5>Penjualan</h5>
                            <h4>Rp 100.012.040</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="bx bx-box"></span>
                        <div>
                            <h5>Produksi</h5>
                            <h4>50 Produk</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
            </div>
            <section class="recent">
                <div class="activity-grid">

                    <div class="summary">
                        <div class="summary-card">

                        </div>
                    </div>
                    <div class="activity-card">
                        <h3>Jadwal Hari Ini</h3>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Uraian</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pemberian Pakan</td>
                                        <td>11 April 2023</td>
                                        <td>03:00 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Pemberian Pakan</td>
                                        <td>11 April 2023</td>
                                        <td>15:00 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Memerah Susu</td>
                                        <td>11 April 2023</td>
                                        <td>20:00 WIB</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </section>

    <!-- Link JS -->
    <script src="js/main.js"></script>
</body>

</html>