<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/logo_ra.ico">
    <title>
        PKG - RA Perwanida Blitar
    </title>


    <!-- My New Bootstrap -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.css">
    <!-- My Fonts -->
    <link rel="stylesheet" href="./assets/js/plugin/webfont/webfont.min.js">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- My jquery -->
    <script src="./vendor/jquery/jquery.js"></script>

    <!-- My Datatables -->
    <link rel="stylesheet" href="./vendor/datatables/datatables.css">
    <link rel="stylesheet" href="./vendor/datatables/Responsive/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="./assets/css/datatable_style.css">

    <!-- My Template -->
    <link rel="stylesheet" href="./assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="./assets/css/sb-admin-2.min.css">
</head>

<body class="bg-gradient-success">
    <?php
    require_once('config/koneksi.php');

    if (isset($_POST['nip'])) {
        $nip = isset($_POST['nip']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['nip'])) : "";
        $password = isset($_POST['password']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['password'])) : "";

        $sql = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE a.nip = '$nip' AND a.password = '$password' ";
        $q = mysqli_query($con, $sql);
        $nr = mysqli_num_rows($q);
        if ($nr > 0) {
            $row = mysqli_fetch_array($q);

            $nama = $row['nama_guru'];
            $level = $row['level'];

            $_SESSION["flash"]["type"] = "success";
            $_SESSION["flash"]["head"] = "Login Berhasil";
            $_SESSION["flash"]["msg"] = "Selamat Datang $nama!";
            $_SESSION[md5('user')] = $row['nip'];
            $_SESSION[md5('nama')] = $nama;
            $_SESSION[md5('level')] = $level;

            // ADMIN / TATA USAHA
            if ($level == 0) {
                header('location:admin/index.php');
            } else {
                header('location:index.php');
            }
        } else {
            $_SESSION["flash"]["type"] = "danger";
            $_SESSION["flash"]["head"] = "Login Gagal";
            $_SESSION["flash"]["msg"] = "NIP/Password Salah!";
            echo "<script>document.location='login.php';</script>";
        }
    }
    ?>
    <!-- my html -->
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-gradient-success">
                                <img src="assets/img/logo_ra.png" class="img-logo img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Aplikasi Web <br> Penilaian Kinerja Guru
                                            <br>
                                            <span class="fw-bold text-success m-1">RA Perwanida Blitar</span>
                                        </h1>
                                    </div>
                                    <form class="user" method="post">
                                        <legend class="fw-bold ">Login</legend>
                                        <div class="m-3">
                                            <?php if (isset($_SESSION["flash"])) { ?>
                                                <div id="alert" class="alert alert-<?= $_SESSION["flash"]["type"]; ?> alert-dismissible alert_model" role="alert"">
                                                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4>
                                                        <?= $_SESSION["flash"]["head"]; ?>
                                                    </h4>
                                                    <?= $_SESSION["flash"]["msg"]; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- NEW -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control form-control-user" id="nip" placeholder="NIP" name="nip" aria-label="NIP">
                                            <label for="nip">NIP</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control form-control-user" id="floatingPassword" placeholder="Password" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <!-- NEW -->
                                        <button type="submit" class="btn btn-success btn-user btn-block" href="">
                                            Login
                                        </button>
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- my html -->

    <!-- old footer -->
    <!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
    <!-- old footer -->

    <!-- My Footer -->

    <!-- My Bootstrap -->
    <script src="./vendor/bootstrap/js/bootstrap.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- My Jquery -->
    <script src="./vendor/jquery/jquery.js"></script>
    <script src="./assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="./assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="./assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- My Script -->
    <script src="./vendor/jquery-easing/jquery.easing.js"></script>

    <!-- My Template -->
    <script src="./assets/js/core/sb-admin-2.js"></script>
    <script src="./assets/js/core/sb-admin-2.min.js"></script>

    <!-- My Script -->
    <script type="text/javascript">
        setTimeout(function() {
            $(".alert").hide(500);
        }, 3000);
    </script>


</body>

</html>