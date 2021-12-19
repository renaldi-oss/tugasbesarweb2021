<?php
error_reporting('E_NOTICE');
session_start();
require 'proses/koneksi.php';


if (isset($_GET['lap'])) {
    $tgl1 = $_GET['tgl1'];
    $tgl2 = $_GET['tgl2'];
    $no = 1;
    $query = mysqli_query($mysqli, "SELECT*FROM penjualan WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'")or die(mysqli_error());
    $query2 = mysqli_query($mysqli, "SELECT*FROM penjualan")or die(mysql_error());
    ?>
    <div class="laporan">
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Laporan Penjualan</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body onload="window.print()">
                <h1 class="header-lap">Laporan Penjualan Buku</h1>
                <?php
                if (isset($tgl1)) {
                    echo "Periode : ".$tgl1." Sampai ".$tgl2;
                }
                ?>
                <p></p>
                <table border="1" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>ID Penjualan</th>
                        <th>ID Buku</th>
                        <th>ID Kasir</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        while ($fetch = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $fetch['id_penjualan']; ?></td>
                                <td><?php echo $fetch['id_buku']; ?></td>
                                <td><?php echo $fetch['id_kasir']; ?></td>
                                <td><?php echo $fetch['jumlah']; ?></td>
                                <td><?php echo number_format($fetch['total']) ?></td>
                                <td><?php echo $fetch['tanggal'];  ?></td>
                            </tr>
                            <?php
                        }
                    }else{
                        while ($fetch = mysqli_fetch_array($query2)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $fetch['id_penjualan']; ?></td>
                                <td><?php echo $fetch['id_buku']; ?></td>
                                <td><?php echo $fetch['id_kasir']; ?></td>
                                <td><?php echo $fetch['jumlah']; ?></td>
                                <td><?php echo number_format($fetch['total']) ?></td>
                                <td><?php echo $fetch['tanggal'];  ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </body>
        </html>
    </div>

    <?php

}else {
    header('location: penjualan.php');
}
?>
