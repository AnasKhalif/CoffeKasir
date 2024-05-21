<?php
session_start();
include('koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    if (empty($nama)) {
        header("Location:editprofil.php?notif=editkosong&jenis=nama");
    } else if (empty($username)) {
        header("Location:editprofil.php?notif=editkosong&jenis=username");
    } else if (empty($email)) {
        header("Location:editprofil.php?notif=editkosong&jenis=email");
    } else {

        $sql = "update `user` set `nama`='$nama', `email`='$email', `username`='$username'
                  where `id_user`='$id_user'";
        //echo $sql;
        mysqli_query($koneksi, $sql);

        header("Location:profil.php?notif=editberhasil");
    }
}
