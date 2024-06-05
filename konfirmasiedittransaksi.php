<?php

session_start();
include('koneksi/koneksi.php');
if (isset($_SESSION['id_transaksi'])) {
    $id_transaksi = $_SESSION['id_transaksi'];
    $nama_coffe = $_POST['namacoffe'];
    $jumlah = $_POST['jumlahcoffe'];
    $pembeli = $_POST['namapembeli'];
    $id_coffe = $_POST['id_coffe'];
    $status = $_POST['status'];



    // mengambil harga
    $harga = mysqli_query($koneksi, "SELECT `harga_coffe` FROM `coffe` WHERE `id_coffe`='$id_coffe'");
    // $harga = "SELECT `harga_coffe` FROM `coffe` WHERE `id_coffe`='$id_coffe'";
    while ($data = mysqli_fetch_array($harga)) {
        $hargaawal = $data['harga_coffe'];
    }

    $totalharga = $hargaawal * $jumlah;
    $pajak = 2000;

    if ($status === 'pelanggan') {
        $pajak = 0;
        $totalsemua = $totalharga - $pajak;
        if (empty($jumlah)) {
            header("Location:editdatatransaksi.php?notif=tambahkosong&jenis=jumlah");
        } else if (empty($pembeli)) {
            header("Location:editdatatransaksi.php?notif=tambahkosong&jenis=pembeli");
        } else {
            $sql = "UPDATE `transaksi` SET `jumlah` = '$jumlah', `subtotal` = '$totalharga', `total` = '$totalsemua', `pembeli` = '$pembeli' WHERE `id_transaksi` = $id_transaksi";
            mysqli_query($koneksi, $sql);
            header("Location:datatransaksi.php?notif=editberhasil");
        }
    } else if ($status === 'bukanpelanggan') {
        $totalsemua = $totalharga + $pajak;
        if (empty($jumlah)) {
            header("Location:editdatatransaksi.php?notif=tambahkosong&jenis=jumlah");
        } else if (empty($pembeli)) {
            header("Location:editdatatransaksi.php?notif=tambahkosong&jenis=pembeli");
        } else {
            $sql = "UPDATE `transaksi` SET `jumlah` = '$jumlah', `subtotal` = '$totalharga', `total` = '$totalsemua', `pembeli` = '$pembeli' WHERE `id_transaksi` = $id_transaksi";
            mysqli_query($koneksi, $sql);
            header("Location:datatransaksi.php?notif=editberhasil");
        }
    }
}
