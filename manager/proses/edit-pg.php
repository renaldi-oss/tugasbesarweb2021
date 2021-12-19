<?php
require 'koneksi.php';

if (isset($_POST['edit'])) {
    $id_kasir = $_POST['id_kasir'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $akses = $_POST['akses'];

    $edit = mysqli_query($mysqli, "UPDATE kasir SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', status = '$status',username = '$username', password = '$password', akses = '$akses' WHERE id_kasir = '$id_kasir'")or die(mysqli_error());
    if ($edit) {
        header('location: ../pegawai.php');
    }

}
?>
