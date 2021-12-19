<?php
require 'halaman/header.php';
$query = mysqli_query($mysqli, 'SELECT*FROM penjualan');
$no = 1;
?>
<div class="container center">
    <!-- <div class="search">
        <form action="penjualan.php" method="post">
            <input type="date" name="search1" value="" placeholder="Masukan Tanggal">
            -
            <input type="date" name="search2" value="" placeholder="Masukan Tanggal">
            <input type="submit" name="cari" value="Cari Penjualan">
            <a href="lap-penjualan.php?lap" target="_blank" class="print">Print Semua Laporan Penjualan</a>
        </form>
    </div> -->
    <div class="container-fluid">
        <div class="d-flex">
            <div class="mr-auto p-2" style="padding-top: 10px">
                <button class="btn btn-outline-success" type="button" id="button-addon1"> <a href="lap-penjualan.php?lap" target="_blank" class="text-success">Print Semua Laporan Penjualan</a></button>
            </div>
            <div class="p-2">
                <form action="penjualan.php" method="post">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control"name="search1" value="" placeholder="Masukan Tanggal">
                        -
                        <input type="date" class="form-control"name="search2" value="" placeholder="Masukan Tanggal">
                        <button class="btn btn-outline-success" type="submit" id="button-addon1" name="cari">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table table-hover">
        <table border='1' cellspacing='0'>
            <tr>
                <th>No.</th>
                <th>ID Penjualan</th>
                <th>ID Buku</th>
                <th>ID Kasir</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>
            <?php
            if (isset($_POST['cari'])) {
                $search1 = $_POST['search1'];
                $search2 = $_POST['search2'];
                $cq = mysqli_query($mysqli, "SELECT*FROM penjualan WHERE tanggal BETWEEN '$search1' AND '$search2'");
                if (mysqli_num_rows($cq) > 0) {
                    while ($dapet = mysqli_fetch_array($cq)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $dapet['id_penjualan']; ?></td>
                            <td><?php echo $dapet['id_buku']; ?></td>
                            <td><?php echo $dapet['id_kasir']; ?></td>
                            <td><?php echo $dapet['jumlah']; ?></td>
                            <td><?php echo "Rp. ".number_format($dapet['total']) ?></td>
                            <td><?php echo $dapet['tanggal'];  ?></td>
                            <td class="hapus"><a href="proses/hapus-pnj.php?hapus=<?php echo $dapet['id_penjualan'] ?>">Hapus</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="8"><a href="lap-penjualan.php?lap&amp;tgl1=<?php echo $search1 ?>&amp;tgl2=<?php echo $search2 ?>" target="_blank" class="print">Print Laporan Penjualan</a></td>
                    </tr>
                    <?php
                }else {
                    echo "<tr><td colspan='11'><b>Penjualan tidak ditemukan</td></tr>";
                }
            }else {
                if (mysqli_num_rows($query) > 0) {
                    while ($fetch = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $fetch['id_penjualan']; ?></td>
                            <td><?php echo $fetch['id_buku']; ?></td>
                            <td><?php echo $fetch['id_kasir']; ?></td>
                            <td><?php echo $fetch['jumlah']; ?></td>
                            <td><?php echo "Rp. ".number_format($fetch['total']) ?></td>
                            <td><?php echo $fetch['tanggal'];  ?></td>
                            <td class="hapus"><a href="proses/hapus-pnj.php?hapus=<?php echo $fetch['id_penjualan'] ?>" >Hapus</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Penjualan kosong</td></tr>";
                }
            }
            ?>
        </table>
    </div>
</div>



<?php require 'halaman/footer.php'; ?>
