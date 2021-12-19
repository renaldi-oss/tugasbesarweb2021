<?php
session_start();
require 'proses/koneksi.php';
$q1 = mysqli_query($mysqli, "SELECT*FROM buku");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Struk Belanja</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="table-keranjang">
            <table border="1" cellspacing="0" class="center">
                <tr>
                    <th>No. ISBN</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>PPN</th>
                    <th>Diskon</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
                <?php
                $jumlah_harga = 0;
                $val = 0;
                if (isset($_SESSION['items'])) {
                    foreach ($_SESSION['items'] as $key => $val) {
                        $q2 = mysqli_query($mysqli, "SELECT*FROM buku WHERE id_buku = '$key'");
                        $f2 = mysqli_fetch_array($q2);

                        $harga = $f2['harga_jual'];
                        $ppn = $f2['ppn'];
                        $diskon = $f2['diskon'];

                        $harga_ppn = $harga*$ppn/100;
                        $harga_diskon = $harga*$diskon/100;
                        $harga_satuan = $harga+$harga_ppn-$harga_diskon;

                        $harga_keseluruhan = $harga_satuan*$val;

                        $jumlah_harga += $harga_keseluruhan;

                        ?>
                        <tr>
                            <td><?php echo $f2['noisbn']; ?></td>
                            <td><?php echo $f2['judul']; ?></td>
                            <td><?php echo $f2['penulis']; ?></td>
                            <td><?php echo $f2['penerbit']; ?></td>
                            <td><?php echo $f2['ppn']."%"; ?></td>
                            <td><?php echo $f2['diskon']."%"; ?></td>
                            <td><?php echo "Rp. ".number_format($harga_satuan)?></td>
                            <td><?php echo $val; ?></td>
                            <td><?php echo "Rp. ".number_format($harga_keseluruhan); ?></td>
                        </tr>
                        <?php

                        if (isset($_GET['belanja'])) {
                            $id_buku = $f2['id_buku'];
                            $id_kasir = $_SESSION['kasir'];
                            $jumlah = $val;
                            $total = $harga_keseluruhan;
                            $tanggal = date('Y-m-d');

                            $q3 = mysqli_query($mysqli, "INSERT INTO penjualan(id_buku,id_kasir,jumlah,total,tanggal) VALUES('$id_buku','$id_kasir','$jumlah','$total','$tanggal')");
                            if ($q3) {
                                unset($_SESSION['items']);
                                header('location: index.php');
                            }

                        }


                    }

                    if ($val != 0) {
                        ?>
                        <tr>
                            <td colspan="11" align="right"><h3><?php echo "Total Belanja Anda : <b>Rp. ".number_format($jumlah_harga)."</b>"; ?></h3></td>
                        </tr>
                        <?php
                    }else{
                        echo "<tr><td colspan='11'><h3><b>Keranjang Kosong</b></h3></td></tr>";
                    }
                }else {
                    echo "<tr><td colspan='11'><h3><b>Keranjang Kosong</b></h3></td></tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
