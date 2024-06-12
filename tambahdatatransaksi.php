<?php

session_start();
include('koneksi/koneksi.php');

if (!isset($_SESSION['id_user'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login.php");
    exit();
}


$role = $_SESSION['level'] === 'admin';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tambah Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <?php

                        if ($role) :

                        ?>
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
                        <?php

                        else :

                        ?>
                            <a class="nav-link" href="profil.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profil
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
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="col-sm-6">
                        <h3><i class="fas fa-plus mt-3"></i> <em>Tambah Data Transaksi</em></h3>
                    </div>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Tambah Data Transaksi</li>
                    </ol>
                    <a href="datatransaksi.php" class="btn btn-sm btn-warning float-right mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

                    <div class="card card-info">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Form Tambah Data Transaksi
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->

                        <!-- </br> -->
                        <!-- <div class="col-sm-10 mx-3 my-0">
                            <div class="alert alert-danger" role="alert">Maaf data nama wajib di isi</div>
                        </div> -->
                        <form class="form-horizontal" action="konfirmasitambahtransaksi.php" method="post">
                            <div class="card-body">

                                <div class="form-group row mt-2">
                                    <label for="id_coffe" class="col-sm-3 col-form-label">Nama Coffe</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="id_coffe" name="id_coffe">
                                            <?php

                                            $coffe = mysqli_query($koneksi, "SELECT * FROM `coffe`");
                                            while ($data = mysqli_fetch_array($coffe)) {
                                                $nama_coffe = $data['nama_coffe'];
                                                $id_coffe = $data['id_coffe'];
                                            ?>

                                                <option value="<?php echo $id_coffe; ?>"><?php echo $nama_coffe; ?></option>

                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="pembeli" class="col-sm-3 col-form-label">Pembeli</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pembeli" id="pembeli" value="">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="level" class="col-sm-3 col-form-label">Status Pembeli</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="level" name="level">
                                            <option value="pelanggan">Pelanggan</option>
                                            <option value="bukanpelanggan">Bukan Pelanggan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tanggal" id="tanggal" value="">
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-sm-12 flex-end">
                                    <button type="submit" class="btn btn-primary "><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
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

</body>

</html>