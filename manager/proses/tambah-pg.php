<?php
require 'koneksi.php';
if (isset($_POST['tambah'])) {
    $id_kasir = $_POST['id_kasir'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $akses = $_POST['akses'];

    $verifikasi1 = mysqli_query($mysqli, "SELECT*FROM kasir WHERE id_kasir = '$id_kasir'");
    $verifikasi2 = mysqli_query($mysqli, "SELECT*FROM kasir WHERE username = '$username'");

    if (mysqli_num_rows($verifikasi1) > 0) {
        ?>
        <script type="text/javascript">
            alert('ID Kasir sudah ada');
            window.history.back();
        </script>
        <?php
    }else {
        if (mysqli_num_rows($verifikasi2) > 0) {
            ?>
            <script type="text/javascript">
                alert('Username sudah ada');
                window.history.back();
            </script>
            <?php
        }else {
            $query = mysqli_query($mysqli, "INSERT INTO kasir VALUES('$id_kasir','$nama','$alamat','$telepon','$status','$username','$password','$akses')")or die(mysqli_error());
            if ($query) {
                header('location: ../pegawai.php');
            }
        }
    }
}

?>
