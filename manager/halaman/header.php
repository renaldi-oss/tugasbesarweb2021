<?php
session_start();
require 'proses/koneksi.php';

if (isset($_SESSION['manager']) == "") {
    header('location: ../index.php');
}

$id = $_SESSION['manager'];
$query = mysqli_query($mysqli, "SELECT*FROM kasir WHERE id_kasir = '$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Manager || Toko Buku</title>
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
        <div class="jumbotron-sm text-center bg-dark rounded text-light" style="margin: 5px 50px 0px 50px;">
            <h1>TOKO BUKU</h1>
            <p>anda berada pada halaman manager</p> 
        </div>
        <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            
            <a href="proses/logout.php?logout"><?php echo $data['nama']; ?> - Logout</a>
            <a href="pegawai.php">Data Pegawai</a>
            <a href="buku.php">Data Buku</a>
            <a href="distributor.php">Data Distributor</a>
            <a href="pasok.php">Pasok Buku</a>
            <a href="penjualan.php">Laporan Penjualan</a>
        </nav> -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark rounded"style="margin: -10px 50px 10px 50px;">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex flex-row-reverse bd-highlight" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="pegawai.php">Data Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buku.php">Data Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="distributor.php">Data Distributor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pasok.php">Pasok Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="penjualan.php">Laporan Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proses/logout.php?logout"><?php echo $data['nama']; ?> - Logout</a>
                    </li>    
                </ul>
            </div>  
        </nav>
