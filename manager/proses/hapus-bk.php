<?php
session_start();
require 'koneksi.php';
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $hapus = mysqli_query($mysqli, "DELETE FROM buku WHERE id_buku = '$id'");
    if ($hapus) {
        header('location: ../buku.php');
    }
}
?>
