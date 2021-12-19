<?php
require 'halaman/header.php';
$query = mysqli_query($mysqli, 'SELECT*FROM kasir');
$no = 1;
?>
<div class="container center">
    <!-- <div class="search">
        <form action="pegawai.php" method="post">
            <input type="text" name="search" value="" placeholder="Masukan Nama Pegawai">
            <input type="submit" name="cari" value="Cari Pegawai">
        </form>
    </div> -->
    <div class="container-fluid">
        <div class="d-flex">
            <div class="mr-auto p-2" style="padding-top: 10px">
                <button class="btn btn-outline-success" type="button" id="button-addon1"><a href="tambah-pegawai.php" class="text-success">Tambah Pegawai Baru</a></button>
            </div>
            <div class="p-2">
            <form action="pegawai.php" method="post">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-success" type="submit" id="button-addon1" name="cari">Cari</button>
                    <input type="text" class="form-control" name="search" value="" placeholder="Masukan Nama Pegawai">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table table-hover">
        <table border='1' cellspacing='0'>
            <tr>
                <th>No.</th>
                <th>ID Kasir</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Username</th>
                <th>Password</th>
                <th>Akses</th>
                <th colspan="2">Opsi</th>
            </tr>
            <?php

            if (isset($_POST['cari'])) {
                $search = $_POST['search'];
                $cq = mysqli_query($mysqli, "SELECT*FROM kasir WHERE nama LIKE '%$search%'");
                if (mysqli_num_rows($cq) > 0) {
                    while ($dapet = mysqli_fetch_array($cq)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $dapet['id_kasir']; ?></td>
                            <td><?php echo $dapet['nama']; ?></td>
                            <td><?php echo $dapet['alamat']; ?></td>
                            <td><?php echo $dapet['telepon']; ?></td>
                            <td><?php echo $dapet['status']; ?></td>
                            <td><?php echo $dapet['username']; ?></td>
                            <td><?php echo $dapet['password']; ?></td>
                            <td><?php echo $dapet['akses']; ?></td>
                            <td class="hapus"><a href="proses/hapus-pg.php?hapus=<?php echo $dapet['id_kasir'] ?>">Hapus</a></td>
                            <td class="edit"><a href="edit-pegawai.php?edit=<?php echo $dapet['id_kasir'] ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Pegawai tidak ditemukan</td></tr>";
                }
            }else {
                if (mysqli_num_rows($query) > 0) {
                    while ($fetch = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $fetch['id_kasir']; ?></td>
                            <td><?php echo $fetch['nama']; ?></td>
                            <td><?php echo $fetch['alamat']; ?></td>
                            <td><?php echo $fetch['telepon']; ?></td>
                            <td><?php echo $fetch['status']; ?></td>
                            <td><?php echo $fetch['username']; ?></td>
                            <td><?php echo $fetch['password']; ?></td>
                            <td><?php echo $fetch['akses']; ?></td>
                            <td class="hapus"><a href="proses/hapus-pg.php?hapus=<?php echo $fetch['id_kasir'] ?>">Hapus</a></td>
                            <td class="edit"><a href="edit-pegawai.php?edit=<?php echo $fetch['id_kasir'] ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>
</div>



<?php require 'halaman/footer.php'; ?>
