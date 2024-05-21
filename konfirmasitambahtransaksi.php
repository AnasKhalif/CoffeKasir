<?php

include('koneksi/koneksi.php');

$id_coffe = $_POST['id_coffe'];
$jumlah = $_POST['jumlah'];
$pembeli = $_POST['pembeli'];
$tanggal = $_POST['tanggal'];
$level = $_POST['level'];

//mengambil harga
$harga = mysqli_query($koneksi, "SELECT `harga_coffe` FROM `coffe` WHERE `id_coffe`='$id_coffe'");
// $harga = "SELECT `harga_coffe` FROM `coffe` WHERE `id_coffe`='$id_coffe'";
while ($data = mysqli_fetch_array($harga)) {
    $hargaawal = $data['harga_coffe'];
}

$totalharga = $hargaawal * $jumlah;
$pajak = 2000;
if ($level === 'pelanggan') {
    $pajak = 0;
    $totalsemua = $totalharga - $pajak;
    if (empty($jumlah)) {
        header("Location:tambahtransaksi.php?notif=tambahkosong&jenis=jumlah");
    } else if (empty($tanggal)) {
        header("Location:tambahtransaksi.php?notif=tambahkosong&jenis=tanggal");
    } else {
        // $sql = "INSERT INTO `transaksi` (`id_transaksi`, `id_coffe`, `harga_coffe`, `jumlah`, `subtotal`, `tanggal`) VALUES (NULL, '$id_coffe', '', '$jumlah', '$totalharga', '$tanggal');";
        $sql = "INSERT INTO `transaksi` (`id_transaksi`, `id_coffe`, `pembeli`, `harga_coffe`, `jumlah`, `subtotal`, `tanggal`, `status`, `pajak`, `total`) VALUES (NULL, '$id_coffe', '$pembeli', '$hargaawal', '$jumlah', '$totalharga', '$tanggal', '$level', '$pajak', '$totalsemua');";
        mysqli_query($koneksi, $sql);
        // Mendapatkan ID transaksi terakhir
        $id_transaksi_terakhir = mysqli_insert_id($koneksi);

        // Mengirimkan ID transaksi terakhir ke halaman tujuan
        header("Location: strukpembayaran.php?data=" . $id_transaksi_terakhir);
        // header("Location:transaksi.php?notif=tambahberhasil");
    }
} else if ($level === 'bukanpelanggan') {
    $totalsemua = $totalharga + $pajak;
    if (empty($jumlah)) {
        header("Location:tambahtransaksi.php?notif=tambahkosong&jenis=jumlah");
    } else if (empty($tanggal)) {
        header("Location:tambahtransaksi.php?notif=tambahkosong&jenis=tanggal");
    } else {
        // $sql = "INSERT INTO `transaksi` (`id_transaksi`, `id_coffe`, `harga_coffe`, `jumlah`, `subtotal`, `tanggal`) VALUES (NULL, '$id_coffe', '', '$jumlah', '$totalharga', '$tanggal');";
        $sql = "INSERT INTO `transaksi` (`id_transaksi`, `id_coffe`, `pembeli`, `harga_coffe`, `jumlah`, `subtotal`, `tanggal`, `status` ,`pajak`, `total`) VALUES (NULL, '$id_coffe', '$pembeli', '$hargaawal', '$jumlah', '$totalharga', '$tanggal', '$level' , '$pajak', '$totalsemua');";
        mysqli_query($koneksi, $sql);
        // Mendapatkan ID transaksi terakhir
        $id_transaksi_terakhir = mysqli_insert_id($koneksi);

        // Mengirimkan ID transaksi terakhir ke halaman tujuan
        header("Location: strukpembayaran.php?data=" . $id_transaksi_terakhir);
        // header("Location:transaksi.php?notif=tambahberhasil");
    }
}
