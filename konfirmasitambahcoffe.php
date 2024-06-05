<?php

include('koneksi/koneksi.php');
$nama_coffe = $_POST['namacoffe'];
$harga_coffe = $_POST['hargacoffe'];

if (empty($nama_coffe)) {
    header("Location:tambahmenucoffe.php?notif=tambahosong&jenis=namacoffe");
} else if (empty($harga_coffe)) {
    header("Location:tambahmenucoffe.php?notif=tambahkosong&jenis=hargacoffe");
} else {
    $sql = "insert into `coffe` (`nama_coffe`, `harga_coffe`) 
	values ('$nama_coffe', '$harga_coffe')";
    mysqli_query($koneksi, $sql);
    header("Location:datacoffe.php?notif=tambahberhasil");
}
