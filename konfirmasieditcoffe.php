<?php
session_start();
include('koneksi/koneksi.php');
if (isset($_SESSION['id_coffe'])) {
    $id_coffe = $_SESSION['id_coffe'];
    $nama_coffe = $_POST['namacoffe'];
    $harga_coffe = $_POST['hargacoffe'];

    if (empty($nama_coffe)) {
        header("Location:editmenucoffe.php?notif=editkosong&jenis=namacoffe");
    } else if (empty($harga_coffe)) {
        header("Location:editmenucoffe.php?notif=editkosong&jenis=hargacoffe");
    } else {
        $sql = "update `coffe` set `nama_coffe`='$nama_coffe', `harga_coffe`='$harga_coffe' 
	where `id_coffe`='$id_coffe'";
        mysqli_query($koneksi, $sql);
        unset($_SESSION['id_coffe']);
        header("Location:datacoffe.php?notif=editberhasil");
    }
}
