<?php
require 'koneksi.php';

if (isset($_POST['edit'])) {
    $id_distributor = $_POST['id_distributor'];
    $nama_distributor = $_POST['nama_distributor'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $edit = mysqli_query($mysqli, "UPDATE distributor SET nama_distributor = '$nama_distributor', alamat = '$alamat', telepon = '$telepon' WHERE id_distributor = '$id_distributor'")or die(mysqli_error());
    if ($edit) {
        header('location: ../distributor.php');
    }

}
?>
