<?php
require 'koneksi.php';
if (isset($_POST['tambah'])) {
    $id_distributor = $_POST['id_distributor'];
    $nama_distributor = $_POST['nama_distributor'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $verifikasi1 = mysqli_query($mysqli, "SELECT*FROM distributor WHERE id_distributor = '$id_distributor'");

    if (mysqli_num_rows($verifikasi1) > 0) {
        ?>
        <script type="text/javascript">
            alert('ID Kasir sudah ada');
            window.history.back();
        </script>
        <?php
    }else {
        $query = mysqli_query($mysqli, "INSERT INTO distributor VALUES('$id_distributor','$nama_distributor','$alamat','$telepon')")or die(mysqli_error());
        if ($query) {
            header('location: ../distributor.php');
        }
    }
}

?>
