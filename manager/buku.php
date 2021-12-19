<?php
require 'halaman/header.php';
$query = mysqli_query($mysqli, 'SELECT*FROM buku');
$no = 1;
?>
<div class="container center">
    <!-- <div class="search">
        <form action="buku.php" method="post">
            <input type="text" name="search" value="" placeholder="Masukan Nama Buku">
            <input type="submit" name="cari" value="Buku Pegawai">
        </form>
    </div> -->
    <div class="container-fluid">
        <div class="d-flex">
            <div class="mr-auto p-2" style="padding-top: 10px">
                <button class="btn btn-outline-success" type="button" id="button-addon1"><a href="tambah-buku.php" class="text-success">Tambah Buku</a></button>
            </div>
            <div class="p-2">
            <form action="buku.php" method="post">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-success" type="submit" id="button-addon1" name="cari">Cari</button>
                    <input type="text" class="form-control" name="search" value="" placeholder="Masukan Nama Buku">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table table-hover">
        <table border='1' cellspacing='0'>
            <tr>
                <th>No.</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>No. ISBN</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Harga Pokok</th>
                <th>Harga Jual</th>
                <th>PPN</th>
                <th>Diskon</th>
                <th colspan="2">Opsi</th>
            </tr>
            <?php

            if (isset($_POST['cari'])) {
                $search = $_POST['search'];
                $cq = mysqli_query($mysqli, "SELECT*FROM buku WHERE judul LIKE '%$search%'");
                if (mysqli_num_rows($cq) > 0) {
                    while ($dapet = mysqli_fetch_array($cq)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $dapet['id_buku']; ?></td>
                            <td><?php echo $dapet['judul']; ?></td>
                            <td><?php echo $dapet['noisbn']; ?></td>
                            <td><?php echo $dapet['penulis']; ?></td>
                            <td><?php echo $dapet['penerbit']; ?></td>
                            <td><?php echo $dapet['tahun']; ?></td>
                            <td><?php echo $dapet['stok']; ?></td>
                            <td><?php echo $dapet['harga_pokok']; ?></td>
                            <td><?php echo $dapet['harga_jual']; ?></td>
                            <td><?php echo $dapet['ppn']; ?>%</td>
                            <td><?php echo $dapet['diskon']; ?>%</td>
                            <td class="hapus"><a href="proses/hapus-bk.php?hapus=<?php echo $dapet['id_buku'] ?>">Hapus</a></td>
                            <td class="edit"><a href="edit-buku.php?edit=<?php echo $dapet['id_buku'] ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Buku tidak ditemukan</td></tr>";
                }
            }else {
                if (mysqli_num_rows($query) > 0) {
                    while ($fetch = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $fetch['id_buku']; ?></td>
                            <td><?php echo $fetch['judul']; ?></td>
                            <td><?php echo $fetch['noisbn']; ?></td>
                            <td><?php echo $fetch['penulis']; ?></td>
                            <td><?php echo $fetch['penerbit']; ?></td>
                            <td><?php echo $fetch['tahun']; ?></td>
                            <td><?php echo $fetch['stok']; ?></td>
                            <td><?php echo $fetch['harga_pokok']; ?></td>
                            <td><?php echo $fetch['harga_jual']; ?></td>
                            <td><?php echo $fetch['ppn']; ?>%</td>
                            <td><?php echo $fetch['diskon']; ?>%</td>
                            <td class="hapus"><a href="proses/hapus-bk.php?hapus=<?php echo $fetch['id_buku'] ?>">Hapus</a></td>
                            <td class="edit"><a href="edit-buku.php?edit=<?php echo $fetch['id_buku'] ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Buku Kosong</td></tr>";
                }
            }
            ?>
        </table>
    </div>

    <!-- <p><a href="tambah-buku.php" class="tambah-baru">Tambah Buku</a></p> -->
</div>



<?php require 'halaman/footer.php'; ?>
