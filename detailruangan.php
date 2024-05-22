<?php

require 'function.php';

session_start();
include("koneksi/koneksi.php");
if (isset($_GET['data'])) {
    $id_ruangan = $_GET['data'];
    $_SESSION["id_ruangan"] = $id_ruangan;
    $query = mysqli_query($koneksi, "SELECT `nama_ruangan` FROM `ruangan` WHERE `id_ruangan` = '$id_ruangan'");
    while ($data = mysqli_fetch_array($query)) {
        $nama_ruangan = $data[0];
    }
}

$sql_count = "SELECT COUNT(*) as no_meja FROM `meja` WHERE `id_ruangan` = '$id_ruangan'";
$count_result = mysqli_query($koneksi, $sql_count);
$count_data = mysqli_fetch_assoc($count_result);

$existing_tables = $count_data['no_meja'];
$totalmeja = 10 - $existing_tables;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Menu Coffe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .zoomable {
            width: 100px;
        }

        .zoomable:hover {
            transform: scale(2.5);
            transition: 0.3s ease;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-center" href="index.php">CoffeKasir</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php" onclick=" return confirm('yakin?')">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>

                        <a class="nav-link" href="profil.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profil
                        </a>
                        <a class="nav-link" href="datacoffe.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-coffee"></i></div>
                            Data Coffe
                        </a>
                        <a class="nav-link" href="datatransaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-exchange"></i></div>
                            Data Transaksi
                        </a>
                        <a class="nav-link" href="datarekap.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Data Rekap
                        </a>
                        <a class="nav-link" href="reservasi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-ticket"></i></div>
                            Reservasi
                        </a>

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="col-sm-6">
                        <h3><i class="fas fa-ticket mt-3"></i> Reservasi Meja</h3>
                    </div>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Reservasi Meja</li>
                    </ol>
                    <a href="reservasi.php" class="btn btn-sm btn-warning float-right mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

                    <div class="card card-info">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Detail ruangan <?php echo $nama_ruangan ?>
                        </div>

                        <form class="form-horizontal" action="konfirmasieditcoffe.php" method="post">
                            <div class="card-body">


                                <div class="form-group row mt-2">
                                    <label for="namacoffe" class="col-sm-3 col-form-label">Nama Ruangan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="namacoffe" id="namacoffe" value="<?php echo $nama_ruangan ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="hargacoffe" class="col-sm-3 col-form-label">Sisa Meja Coffe</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="hargacoffe" id="hargacoffe" value="<?php echo $totalmeja ?>" readonly>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->

                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </main>
            <main>
                <div class="container-fluid px-4 mt-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Meja
                        </div>

                        <div class="col-sm-10 mx-3 my-3">
                            <?php if (!empty($_GET['notif'])) {
                                if ($_GET['notif'] == "tambahberhasil") { ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Ditambah</div>
                                <?php } ?>
                            <?php } ?>
                        </div>


                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Ruangan</th>
                                        <th class="text-center">No Meja</th>
                                        <th class="text-center">Nama Pemesan</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query_meja = mysqli_query($koneksi, "SELECT m.*, r.nama_ruangan FROM `meja` m JOIN `ruangan` r ON m.id_ruangan = r.id_ruangan WHERE m.id_ruangan = '$id_ruangan'");
                                    while ($data = mysqli_fetch_array($query_meja)) {
                                        $id_meja = $data['id_meja'];
                                        $nama_ruangan1 = $data['nama_ruangan'];
                                        $nomor_meja = $data['no_meja'];
                                        $nama_pemesan = $data['nama_pemesan'];
                                        $tanggal = $data['tanggal'];
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><?php echo $nama_ruangan1 ?></td>
                                            <td class="text-center"><?php echo $nomor_meja ?></td>
                                            <td class="text-center"><?php echo $nama_pemesan ?></td>
                                            <td class="text-center"><?php echo $tanggal ?></td>
                                            <td class="text-center">
                                                <a href="detailruangan.php?data=<?php echo $id_coffe; ?>" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Hapuss</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- Button trigger modal -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Nomor Meja
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Pluto 2024</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>


    <!-- Datatables -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="post">
                    <div class="modal-body">
                        <select name="id_ruangan" class="form-control">
                            <option value="<?= $id_ruangan; ?>"><?= $nama_ruangan; ?></option>
                        </select>
                        <br>
                        <input type="text" name="no_meja" class="form-control" placeholder="No Meja" required>
                        <br>
                        <input type="text" name="nama_pemesan" class="form-control" placeholder="Nama Pemesan" required>
                        <br>
                        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="tambahmeja">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>