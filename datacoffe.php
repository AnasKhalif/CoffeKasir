<?php
session_start();
include('koneksi/koneksi.php');

if (!isset($_SESSION['id_user'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login.php");
    exit();
}


$role = $_SESSION['level'] === 'admin';
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_coffe = $_GET['data'];
        //hapus kategori blog
        $sql = "delete from `coffe` 
          where `id_coffe` = '$id_coffe'";
        mysqli_query($koneksi, $sql);
    }
}

$search_query = '';
if (isset($_POST['search'])) {
    $search_query = mysqli_real_escape_string($koneksi, $_POST['search']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Coffe</title>
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

                            <a class="nav-link" href="datatransaksi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-exchange"></i></div>
                                Data Transaksi
                            </a>
                            <a class="nav-link" href="datarekap.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Data Rekap
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
                        <h3><i class="fas fa-coffee mt-3"></i> Data Coffe</h3>
                    </div>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Data Coffe</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Coffe
                        </div>

                        <div class="col-sm-4 mx-3 my-3">
                            <?php if (!empty($_GET['notif'])) {
                                if ($_GET['notif'] == "editberhasil") { ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Diubah</div>
                                <?php } else if ($_GET['notif'] == "tambahberhasil") { ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Ditambah</div>
                                <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Dihapus</div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="col-sm-4 mb-2 mx-3">
                            <form method="post" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="search">
                                    <button class="btn btn-primary mx-1" type="submit">Search</button>
                                </div>
                            </form>
                        </div>


                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class=" text-center">No</th>
                                        <th class="text-center">Nama Coffe</th>
                                        <th class="text-center">Harga Coffe</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql_k = "SELECT `id_coffe`,`nama_coffe`, `harga_coffe` FROM 
                                    `coffe`";
                                    if ($search_query != '') {
                                        $sql_k .= " WHERE `nama_coffe` LIKE '%$search_query%'";
                                    }
                                    $query_k = mysqli_query($koneksi, $sql_k);
                                    $no = 1;
                                    while ($data_k = mysqli_fetch_row($query_k)) {
                                        $id_coffe = $data_k[0];
                                        $nama_coffe = $data_k[1];
                                        $harga_coffe = $data_k[2];

                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><?php echo $nama_coffe ?></td>
                                            <td class="text-center"><?php echo $harga_coffe ?></td>
                                            <td class="text-center">
                                                <a href="editmenucoffe.php?data=<?php echo $id_coffe; ?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data 
                                                <?php echo $nama_coffe; ?>?'))window.location.href =  
                                                'datacoffe.php?aksi=hapus&data=<?php echo $id_coffe; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    } ?>
                                </tbody>
                            </table>
                            <!-- Button trigger modal -->
                            <div class="card-tools">
                                <a href="tambahmenucoffe.php" class="btn btn-sm btn-primary float-right">
                                    <i class="fas fa-plus"></i> Tambah Menu Coffe</a>
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
</body>

</html>