<?php
require 'halaman/header.php';
$query = mysqli_query($mysqli, 'SELECT*FROM distributor');
$no = 1;
?>
<div class="container center">
    <!-- <div class="search">
        <form action="distributor.php" method="post">
            <input type="text" name="search" value="" placeholder="Masukan Nama Distributor">
            <input type="submit" name="cari" value="Cari Distributor">
        </form>
    </div> -->
    <div class="container-fluid">
        <div class="d-flex">
            <div class="mr-auto p-2" style="padding-top: 10px">
                <button class="btn btn-outline-success" type="button" id="button-addon1"><a href="tambah-distributor.php" class="text-success">Tambah Distributor</a></button>
            </div>
            <div class="p-2">
            <form action="distributor.php" method="post">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-success" type="submit" id="button-addon1" name="cari">Cari</button>
                    <input type="text" class="form-control" name="search" value="" placeholder="Masukan Distributor">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table table-hover">
        <table border='1' cellspacing='0'>
            <tr>
                <th>No.</th>
                <th>ID Distributor</th>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th colspan="2">Opsi</th>
            </tr>
            <?php

            if (isset($_POST['cari'])) {
                $search = $_POST['search'];
                $cq = mysqli_query($mysqli, "SELECT*FROM distributor WHERE nama_distributor LIKE '%$search%'");
                if (mysqli_num_rows($cq) > 0) {
                    while ($dapet = mysqli_fetch_array($cq)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $dapet['id_distributor']; ?></td>
                            <td><?php echo $dapet['nama_distributor']; ?></td>
                            <td><?php echo $dapet['alamat']; ?></td>
                            <td><?php echo $dapet['telepon']; ?></td>
                            <td class="hapus"><a href="proses/hapus-dis.php?hapus=<?php echo $dapet['id_distributor'] ?>">Hapus</a></td>
                            <td class="edit"><a href="edit-distributor.php?edit=<?php echo $dapet['id_distributor'] ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Distributor tidak ditemukan</td></tr>";
                }
            }else {
                if (mysqli_num_rows($query) > 0) {
                    while ($fetch = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $fetch['id_distributor']; ?></td>
                            <td><?php echo $fetch['nama_distributor']; ?></td>
                            <td><?php echo $fetch['alamat']; ?></td>
                            <td><?php echo $fetch['telepon']; ?></td>
                            <td class="hapus"><a href="proses/hapus-dis.php?hapus=<?php echo $fetch['id_distributor'] ?>">Hapus</a></td>
                            <td class="edit"><a href="edit-distributor.php?edit=<?php echo $fetch['id_distributor'] ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                }else {
                    echo "<tr><td colspan='11'><b>Distributor Kosong</td></tr>";
                }
            }
            ?>
        </table>
    </div>

    <!-- <p><a href="tambah-distributor.php" class="tambah-baru">Tambah Distributor</a></p> -->
</div>



<?php require 'halaman/footer.php'; ?>
