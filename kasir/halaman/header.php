<?php
session_start();
require 'proses/koneksi.php';

if (isset($_SESSION['kasir']) == "") {
    header('location: ../index.php');
}

$id = $_SESSION['kasir'];
$query = mysqli_query($mysqli, "SELECT * FROM kasir WHERE id_kasir = '$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kasir || Toko Buku</title>
        <link rel="stylesheet" href="style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- <nav>
            <a href="proses/logout.php?logout"><?php echo $data['nama']; ?> - Logout</a>
        </nav> -->
        <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark rounded"style="margin: -10px 50px 10px 50px;">
            <a href="proses/logout.php?logout"><?php echo $data['nama']; ?> - Logout</a>
        </nav> -->
        <nav class="navbar navbar-inverse bg-dark rounded" style="margin: 5px 5px 10px 5px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand text-light" href="#">Kasir - <?php echo $data['nama'];?></a>
                </div>
                    <a href="proses/logout.php?logout" class="rounded text-light">Logout</a>
            </div>
        </nav>
