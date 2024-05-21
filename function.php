<?php

include("koneksi/koneksi.php");

if (isset($_POST["tambahmeja"])) {
    $id_ruangan = $_POST["id_ruangan"];
    $nomor_meja = $_POST['no_meja'];
    $nama_pemesan = $_POST["nama_pemesan"];
    $tanggal = $_POST['tanggal'];


    $sql_count = "SELECT COUNT(*) as no_meja FROM `meja` WHERE `id_ruangan` = '$id_ruangan'";
    $count_result = mysqli_query($koneksi, $sql_count);
    $count_data = mysqli_fetch_assoc($count_result);

    if ($count_data['no_meja'] >= 10) {
        echo "<script>
        alert('Ruangan penuh. Tidak dapat menambah meja.');
        window.location.href = 'detailruangan.php?data=$id_ruangan';
        </script>";
    } else {
        // Check if the table number already exists for the given room
        $sql_meja = "SELECT `no_meja` FROM `meja` WHERE `no_meja` = '$nomor_meja'";
        $check_result = mysqli_query($koneksi, $sql_meja);

        if (mysqli_num_rows($check_result) > 0) {
            // If the table number already exists, do not insert and show a message
            echo "<script>
        alert('No Meja Sudah Di Pesan');
        window.location.href = 'detailruangan.php?data=$id_ruangan';
        </script>";
        } else {
            // If no existing table number, insert the new entry
            $sql = "INSERT INTO `meja` (`id_meja`, `id_ruangan`, `no_meja`, `nama_pemesan`, `tanggal`) 
                VALUES (NULL, '$id_ruangan', '$nomor_meja', '$nama_pemesan', '$tanggal')";
            if (mysqli_query($koneksi, $sql)) {
                // Redirect to the detail page after successful insertion
                header("Location: detailruangan.php?data=$id_ruangan");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        }
    }
}
