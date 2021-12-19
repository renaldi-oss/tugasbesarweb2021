<?php
require 'halaman/header.php';
$query = mysqli_query($mysqli, 'SELECT*FROM pasok');
$no = 1;
?>

<div class="container center">
    <!-- <div class="search">
        <form action="pasok.php" method="post">
            <input type="date" name="search1" value="" placeholder="Masukan Tanggal">
            -
            <input type="date" name="search2" value="" placeholder="Masukan Tanggal">
            <input type="submit" name="cari" value="Cari Pasok">
            <a href="lap-pasok.php?lap" target="_blank" class="print">Print Semua Laporan Pasok</a>
        </form>
    </div> -->
    <div class="container-fluid">
        <div class="d-flex">
            <div class="mr-auto p-2" style="padding-top: 10px">
                <button class="btn btn-outline-success" type="button" id="button-addon1"><a href="tambah-pasok.php" class="text-success">Tambah pasokan</a></button>
                <button class="btn btn-outline-success" type="button" id="button-addon1"><a href="lap-pasok.php?lap" target="_blank"  class="text-success">Print Semua Laporan Pasokan</a></button>
            </div>
            <div class="p-2">
                <form action="pasok.php" method="post">
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
                <th>ID Pasok</th>
                <th>ID Distributor</th>
                <th>ID Buku</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>
            <?php
            if (isset($_POST['cari'])) {
                $search1 = $_POST['search1'];
                $search2 = $_POST['search2'];
                $cq = mysqli_query($mysqli, "SELECT*FROM pasok WHERE tanggal BETWEEN '$search1' AND '$search2'");
                if (mysqli_num_rows($cq) > 0) {
                    while ($dapet = mysqli_fetch_array($cq)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $dapet['id_pasok']; ?></td>
                            <td><?php echo $dapet['id_buku']; ?></td>
                            <td><?php echo $dapet['id_distributor']; ?></td>
                            <td><?php echo $dapet['jumlah']; ?></td>
                            <td><?php echo $dapet['tanggal'];  ?></td>
                            <td class="hapus"><a href="proses/hapus-ps.php?hapus=<?php echo $dapet['id_pasok'] ?>">Hapus</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <table>
                        <tr>
                            <td><a href="lap-pasok.php?lap&amp;tgl1=<?php echo $search1 ?>&amp;tgl2=<?php echo $search2 ?>" target="_blank" class="print">Print Laporan Pasok</a></td>
                        </tr>
                    </table>

                    <?php
                }else {
                    echo "<tr><td colspan='11'><b>Pasok tidak ditemukan</td></tr>";
                }
            }else {
                if (mysqli_num_rows($query) > 0) {
                    while ($fetch = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $fetch['id_pasok']; ?></td>
                            <td><?php echo $fetch['id_buku']; ?></td>
                            <td><?php echo $fetch['id_distributor']; ?></td>
                            <td><?php echo $fetch['jumlah']; ?></td>
                            <td><?php echo $fetch['tanggal']; ?></td>
                            <td class="hapus"><a href="proses/hapus-ps.php?hapus=<?php echo $fetch['id_pasok'] ?>">Hapus</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Pasok kosong</td></tr>";
                }
            }
            ?>
        </table>
    </div>

    <!-- <p><a href="tambah-pasok.php" class="tambah-baru">Tambah Pasok</a></p> -->
</div>



<?php require 'halaman/footer.php'; ?>
