<?php
session_start();
require 'koneksi.php';
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $hapus = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id_penjualan = '$id'");
    if ($hapus) {
        header('location: ../penjualan.php');
    }
}

?>
