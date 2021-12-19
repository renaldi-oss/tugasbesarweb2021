<?php
require 'koneksi.php';
if (isset($_POST['tambah'])) {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $noisbn = $_POST['noisbn'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];
    $harga_pokok = $_POST['harga_pokok'];
    $harga_jual = $_POST['harga_jual'];
    $ppn = $_POST['ppn'];
    $diskon = $_POST['diskon'];

    $verifikasi1 = mysqli_query($mysqli, "SELECT*FROM buku WHERE id_buku = '$id_buku'");

    if (mysqli_num_rows($verifikasi1) > 0) {
        ?>
        <script type="text/javascript">
            alert('ID Buku sudah ada');
            window.history.back();
        </script>
        <?php
    }else {
        $query = mysqli_query($mysqli, "INSERT INTO buku VALUES('$id_buku','$judul','$noisbn','$penulis','$penerbit','$tahun','$stok','$harga_pokok','$harga_jual','$ppn','$diskon')")or die(mysqli_error());
        if ($query) {
            header('location: ../buku.php');
        }
    }
}

?>
