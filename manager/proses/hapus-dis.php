<?php
session_start();
require 'koneksi.php';
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $hapus = mysqli_query($mysqli, "DELETE FROM distributor WHERE id_distributor = '$id'");
    if ($hapus) {
        header('location: ../distributor.php');
    }
}

?>
