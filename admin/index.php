<?php
require_once('../config/koneksi.php');


if (!isset($_SESSION[md5('user')]) || $_SESSION[md5('user')] == '') {
    echo "<script>document.location='../login.php';</script>";
} else if ($_SESSION[md5('level')] != 0) {
    echo "<script>document.location='../index.php';</script>";
}

if (isset($_GET['logout'])) {
    $_SESSION[md5('user')] = '';
    $_SESSION[md5('nama')] = '';
    $_SESSION[md5('level')] = '';
    unset($_SESSION[md5('user')]);
    unset($_SESSION[md5('nama')]);
    unset($_SESSION[md5('level')]);
    echo "<script>document.location='../login.php';</script>";
}
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon"
              href="./../assets/img/logo_ra.ico">


        <title>Admin - PKG - RA Perwanida Blitar</title>

        <!-- Bootstrap core CSS -->
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link href="assets/plugins/d3-chart/gauge.css" rel="stylesheet"> -->
        <!-- <link href="assets/plugins/d3-chart/bar.css" rel="stylesheet"> -->

        <!-- <link href="assets/css/font-awesome.min.css" rel="stylesheet"> -->
        <!-- <link href="assets/css/navbar-top-fixed.css" rel="stylesheet"> -->

        <!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
        <!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
        <script type="text/javascript"
                src="./../vendor/@popperjs/core/dist/umd/popper.js"></script>
        <!-- <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2"></script> -->
        <script type="text/javascript"
                src="./../assets/plugins/d3-chart/d3.min.js"></script>
        <script type="text/javascript"
                src="./../assets/plugins/d3-chart/d3.v5.min.js"></script>
        <!-- Custom styles for this template -->

        <!-- My Head wkwk -->
        <!-- My New Bootstrap -->
        <link rel="stylesheet"
              href="./../vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="./../vendor/bootstrap/css/bootstrap.css">
        <!-- My Fonts -->
        <link rel="stylesheet"
              href="./../assets/js/plugin/webfont/webfont.min.js">
        <link rel="stylesheet"
              href="./../vendor/fontawesome-free/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">

        <!-- My jquery -->
        <script src="./../vendor/jquery/jquery.min.js"></script>

        <!-- My Datatables -->
        <link rel="stylesheet"
              href="./../vendor/datatables/datatables.min.css">
        <!-- My Datatables -->
        <link rel="stylesheet"
              href="./../vendor/datatables/datatables.css">
        <link rel="stylesheet"
              href="./../vendor/datatables/Responsive/css/responsive.bootstrap5.css">
        <link rel="stylesheet"
              href="./../assets/css/datatable_style.css">
        <script src="./../vendor/datatables/datatables.js"></script>

        <!-- My Template -->
        <link rel="stylesheet"
              href="./../assets/css/sb-admin-2.css">
        <link rel="stylesheet"
              href="./../assets/css/sb-admin-2.min.css">
        <!-- My Head wkwk -->

        <!-- add -->
        <script type="text/javascript"
                src="./../assets/js/jquery.min.js"></script>
        <script type="text/javascript"
                src="./../assets/js/bootstrap.js"></script>
        <!-- <script type="text/javascript" src="assets/js/popper.min.js"></script> -->
        <script type="text/javascript"
                src="./../assets/plugins/d3-chart/d3.v5.min.js"></script>

        <!-- my CSS -->
        <link rel="stylesheet"
              href="./../assets/css/scroll.css">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion"
                id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <div class="row d-flex justify-content-center">
                    <div class="col col-6">
                        <a class="logo mx-auto text-white fw-bold"
                           href="index.php">
                            <div class="logo">
                                <div class="sidebar-brand-icon bg-primar mt-2 d-flex justify-content-center">
                                    <img src="./../assets/img/logo_ra.png"
                                         class="img-logo img-fluid"
                                         style="width: 60%">
                                </div>
                            </div>
                    </div>
                    <div class="col col-12">
                        <div class="sidebar-brand-text mx-3 mb-2 text-white fw-bold text-center">
                            <p>RA Perwanida Blitar</p>
                        </div>
                        </a>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Informasi Umum
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item"
                    href="index.php?p=home">
                    <a class="nav-link"
                       href="index.php?p=home">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    <span class="sr-only">(current)</span>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data
                </div>

                <!-- Nav Item - Pages Pengguna -->
                <li class="nav-item"
                    href="index.php?p=mjuser">
                    <a class="nav-link"
                       href="index.php?p=mjuser">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Jenis User</span>
                    </a>
                </li>

                <li class="nav-item"
                    href="index.php?p=muser">
                    <a class="nav-link"
                       href="index.php?p=muser">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Users</span></a>
                </li>

                <li class="nav-item"
                    href="index.php?p=mjeniskom">
                    <a class="nav-link"
                       href="index.php?p=mjeniskom">
                        <i class="fas fa-fw fa-clipboard-list"></i>
                        <span>Jenis Kompetensi</span></a>
                </li>

                <li class="nav-item"
                    href="index.php?p=misikom">
                    <a class="nav-link"
                       href="index.php?p=misikom">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Isi Kompetensi</span></a>
                </li>

                <li class="nav-item"
                    href="index.php?p=mperiode">
                    <a class="nav-link"
                       href="index.php?p=mperiode">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Periode</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0"
                            id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper"
                 class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- NAVBAR -->
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop"
                                class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <?php
                    $nip_user = $_SESSION[md5('user')];
                    $sql = "SELECT * FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai JOIN user d ON a.nip = d.nip WHERE b.nip = '$nip_user' AND b.id_penilai_detail NOT IN(SELECT c.id_penilai_detail FROM penilaian c WHERE c.id_penilai_detail = b.id_penilai_detail) GROUP BY a.id_penilai";
                    $q = mysqli_query($con, $sql);
                    $nr = mysqli_num_rows($q);

                    if ($_SESSION[md5('level')] == 3 || $_SESSION[md5('level')] == 2) {
                        $sql_a = "SELECT 
                          a.nip AS 'nip_dinilai',
                          d.nama_guru AS 'nama_dinilai',
                          b.nip AS 'nama_penilai',
                          e.nama_guru AS 'nama_penilai',
                          SUM(c.hasil_nilai) AS nilai
                        FROM (penilai a JOIN user d ON a.nip = d.nip)
                        JOIN (penilai_detail b  JOIN user e ON b.nip = e.nip) ON a.id_penilai = b.id_penilai
                        LEFT JOIN penilaian c ON b.id_penilai_detail = c.id_penilai_detail
                        GROUP BY a.nip, b.nip
                        HAVING  ISNULL(SUM(c.hasil_nilai))";
                        $q_a = mysqli_query($con, $sql_a);
                        $nr_a = mysqli_num_rows($q_a);
                    }

                    ?>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle"
                                   href="#"
                                   id="alertsDropdown"
                                   role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <?php if ($nr > 0 && isset($nr_a)) {
                                    $nr += $nr_a; ?>
                                    <span class="badge badge-danger"><?= $nr; ?></span>
                                    <?php } else if (isset($nr_a) && $nr_a > 0) { ?>
                                    <span class="badge badge-danger"></span>
                                    <?php } else if ($nr > 0) { ?>
                                    <span class="badge badge-danger"><?= $nr; ?></span>
                                    <?php } ?>
                                    <!-- Counter - Alerts -->
                                    <!-- <span class="badge badge-danger badge-counter">3+</span> -->
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="alertsDropdown"
                                     aria-labelledby="alertsDropdown"
                                     style="height: 50vh; overflow-y: scroll;">
                                    <h6 class="dropdown-header bg-success border-success">
                                        Notifikasi
                                    </h6>
                                    <?php if ($nr > 0 && isset($nr_a)) { ?>
                                    <p class="dropdown-item disabled">
                                        Anda belum melakukan penilaian kepada :
                                    </p>
                                    <?php
                                    while ($row = mysqli_fetch_array($q)) {
                                    ?>
                                    <a class="dropdown-item"
                                       href="index.php?p=melakukanpen&id=<?= $row['id_penilai']; ?>">
                                        <span data-feather="user"></span> &nbsp;&nbsp;&nbsp;
                                        <?= $row['nama_guru']; ?>
                                    </a>
                                    <?php } ?>
                                    <p class="dropdown-item disabled">
                                        Guru yang belum melakukan penilaian :
                                    </p>
                                    <?php
                                    while ($row = mysqli_fetch_array($q_a)) {
                                    ?>
                                    <p class="dropdown-item">
                                        <span data-feather="user"></span> &nbsp;&nbsp;&nbsp;
                                        <?= '<strong>' . $row['nama_penilai'] . '</strong> kepada : <strong>' . $row['nama_dinilai'] . '</strong>'; ?>
                                    </p>
                                    <?php } ?>
                                    <?php } else if ($nr > 0) { ?>
                                    <a class="dropdown-item"
                                       href="#">
                                        <p class="dropdown-item disabled">
                                            Anda belum melakukan penilaian kepada :
                                        </p>
                                        <?php
                                        while ($row = mysqli_fetch_array($q)) {
                                        ?>
                                        <a class="dropdown-item"
                                           href="index.php?p=melakukanpen&id=<?= $row['id_penilai']; ?>">
                                            <span data-feather="user"></span> &nbsp;&nbsp;&nbsp;
                                            <?= $row['nama_guru']; ?>
                                        </a>
                                        <?php } ?>
                                    </a>
                                    <?php } else if ($nr > 0) { ?>
                                    <div class="dropdown-item">
                                        <p class="dropdown-item disabled">
                                            Guru yang belum melakukan penilaian :
                                        </p>
                                        <?php
                                        while ($row = mysqli_fetch_array($q_a)) {
                                        ?>
                                        <p class="dropdown-item">
                                            <span data-feather="user"></span> &nbsp;&nbsp;&nbsp;
                                            <?= '<strong>' . $row['nama_penilai'] . '</strong> kepada : <strong>' . $row['nama_dinilai'] . '</strong>'; ?>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <?php } else if (isset($nr_a) && $nr_a > 0) { ?>
                                    <div class="dropdown-item">
                                        <p class="dropdown-item disabled">
                                            Kosong
                                        </p>
                                    </div>
                                    <?php } ?>
                            </li>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle"
                                   href="#"
                                   id="userDropdown"
                                   role="button"
                                   data-bs-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <div class="d-flex flex-column">
                                        <sup
                                             class="mr-2 d-none d-lg-inline text-gray-600 small mb-3"><?= get_user_login('nama_guru')  ?></sup>
                                        <sup
                                             class="mr-2 d-none d-lg-inline text-danger small"><?= get_user_login('jabatan')  ?></sup>
                                    </div>
                                    <img class="img-profile rounded-circle"
                                         src="./../assets/img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item"
                                       href="index.php?p=profil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                       data-bs-toggle="modal"
                                       data-bs-target="#logoutModal"
                                       href="#">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->
                    <!-- End NAVBAR -->
                    <?php if (isset($_SESSION["flash"])) { ?>
                    <div class="alert alert-<?= $_SESSION["flash"]["type"]; ?> alert-dismissible alert_model"
                         role="alert">
                        <button type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?= $_SESSION["flash"]["head"]; ?></strong> <?= $_SESSION["flash"]["msg"]; ?>
                    </div>
                    <?php unset($_SESSION['flash']);
                } ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <main role="main"
                              id="page-wraper">
                            <?php
                        if (isset($_GET['p'])) {
                            $dir = 'pages';
                            $page = $_GET['p'] . '.php';
                            $hal = scandir($dir);
                            if (in_array($page, $hal)) {
                                include $dir . '/' . $page;
                            } else {
                                echo 'NOT FOUND';
                            }
                        } else {
                            include 'pages/home.php';
                        }
                        ?>
                        </main>
                    </div>
                    <!-- /.container-fluid -->

                    <!-- Footer -->
                    <footer class="sticky-footer">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Penilaian Kinerja Guru - RA Perwanida Blitar <span
                                          id="year_copyright"></span></span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded"
           href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Modal -->
        <!-- Logout Modal-->
        <div class="modal fade"
             id="logoutModal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">Anda mau Logout?</h5>
                        <button class="close"
                                type="button"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" maka sesi login anda akan berakhir!</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"
                                type="button"
                                data-bs-dismiss="modal">Batal</button>
                        <a class="btn btn-danger"
                           href="index.php?logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->




        <!-- Bootstrap core JavaScript
    ================================================== -->
        <script src="./../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="./../assets/js/feather.min.js"></script>
        <script src="./../assets/js/getYears.js"></script>

        <!-- jquery -->
        <script src="./../vendor/jquery/jquery.js"></script>
        <script src="./../vendor/jquery/jquery.min.js"></script>
        <script src="./../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script src="./../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="./../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="./../vendor/jquery-easing/jquery.easing.js"></script>
        <script src="./../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- chart -->
        <script src="./../vendor/chart.js/Chart.min.js"></script>

        <!-- my Template -->
        <!-- <script src="./assets/js/core/sb-admin-2.js"></script> -->
        <script src="./../assets/js/core/sb-admin-2.min.js"></script>



        <!-- datatables -->
        <script src="./../vendor/datatables/datatables.js"></script>
        <script src="./../vendor/datatables/datatables.min.js"></script>
        <script src="./../vendor/datatables/Responsive/js/responsive.bootstrap5.js"></script>

        <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        let table = new DataTable('#myTable', {
            responsive: true
        })
        </script>

        <script type="text/javascript">
        $(document).ready(function() {


            var url = document.URL;
            var segments = url.split('/');
            //console.log(url);
            console.log(segments[5]);

            if (segments[5] == "index.php" || segments[5] == "") {
                $("[href='index.php?p=home']").addClass('active');
                return;
            } else {
                $("[href='" + segments[5] + "']").addClass('active');
                /*var a = segments[5];
                $("#"+a).addClass('active');*/
            }

            //$('.dataTable').DataTable();

        });

        setTimeout(function() {
            $(".alert").hide(500);
        }, 3000);
        </script>

        <script>
        feather.replace()
        </script>
    </body>

</html>