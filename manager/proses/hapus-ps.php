<?php
session_start();
require 'koneksi.php';
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $hapus = mysqli_query($mysqli, "DELETE FROM pasok WHERE id_pasok = '$id'");
    if ($hapus) {
        header('location: ../pasok.php');
    }
}

?>
