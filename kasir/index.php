<?php
require 'halaman/header.php';

$q1 = mysqli_query($mysqli, "SELECT*FROM buku");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="card login-form" class="secondary">
                <div class="card-body">
                    <h3 class="form-header">Form Pembelian Buku</h3>
                    <hr>
                    <form action="proses/keranjang.php" method="post" class="form">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="id_buku">Buku</label>
                            <select class="form-select"name="id_buku" class="form-control">
                                <option value="" selected disabled>Pilih Buku</option>
                                <?php
                                while ($f1 = mysqli_fetch_array($q1)) {
                                    ?>
                                    <option value="<?php echo $f1['id_buku'] ?>"><?php echo $f1['judul']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Jumlah Beli</span>
                            <input type="number" aria-label="First name" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                        <input type="submit" name="masuk" value="Masukan Ke Keranjang" class="btn btn-primary text-dark">
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <div class="col-sm-8">
        <div class="card-body">
            <div class="table-keranjang">
                <h3 class="d-flex justify-content-center">Keranjang</h3>
                <table border="1" cellspacing="0" class="table table-striped justify-content-center">
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
                        <th colspan="2">Aksi</th>
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
                                <td><?php echo$f2['noisbn'];?></td>
                                <td><?php echo$f2['judul'];?></td>
                                <td><?php echo$f2['penulis'];?></td>
                                <td><?php echo$f2['penerbit'];?></td>
                                <td><?php echo$f2['ppn']."%";?></td>
                                <td><?php echo$f2['diskon']."%";?></td>
                                <td><?php echo"Rp. ".number_format($harga_satuan)?></td>
                                <td><?php echo$val;?></td>
                                <td><?php echo"Rp. ".number_format($harga_keseluruhan);?></td>
                                <td class="kurang"><a href="proses/keranjang.php?aksi=kurang&amp;id_buku=<?php echo$f2['id_buku']?>">Kurang</a></td>
                                <td class="hapus"><a href="proses/keranjang.php?aksi=hapus&amp;id_buku=<?php echo$f2['id_buku']?>">Hapus</a></td>
                            </tr>
                            <?php
                            function function_alert($msg) {
                                echo "<script type='text/javascript'>alert('$msg');</script>";
                            }
                            if (isset($_GET['belanja'])) {
                                $id_buku = $f2['id_buku'];
                                $id_kasir = $_SESSION['kasir'];
                                $jumlah = $val;
                                $total = $harga_keseluruhan;
                                $tanggal = date('Y-m-d');
                                $q3 = mysqli_query($mysqli,"INSERT INTO penjualan(id_buku,id_kasir,jumlah,total,tanggal) VALUES('$id_buku','$id_kasir','$jumlah','$total','$tanggal')");
                                if ($q3) {
                                    unset($_SESSION['items']);
                                    #header('location: index.php');
                                    #alert("item didalam keranjang telah terbeli");
                                    function_alert("item didalam keranjang telah terbeli");

                                }
                            }
                        }
                        if ($val != 0) {
                            ?>
                            <tr>
                                <td colspan="11" align="right"><h3><?php echo "Total Belanja Anda : <b>Rp. ".number_format($jumlah_harga)."</b>";?></h3></td>
                            </tr>
                            <table class="right">
                                <br>
                                <tr>
                                    <td align="right" class="bersih"><a href="proses/keranjang.php?aksi=bersih">Bersih</a></td>
                                    <td align="right" class="belanja"><a href="?belanja">Lakukan Pembayaran</a></td>
                                </tr>

                            </table>
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
        </div>
    </div>
</div>
<?php require 'halaman/footer.php'; ?>