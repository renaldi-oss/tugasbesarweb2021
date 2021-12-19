<?php
require 'halaman/header.php';
$q1 = mysqli_query($mysqli, "SELECT*FROM distributor");
$q2 = mysqli_query($mysqli, "SELECT*FROM buku");
?>
<div class="panel-input">
    <h1 class="judul-input">Pasok Buku</h1>
    <form action="proses/tambah-ps.php" method="post">
        <p>
            <select name="id_distributor">
                <option value="" selected disabled>Pilih Distributor</option>
                <?php
                while ($f1 = mysqli_fetch_array($q1)) {
                    ?>
                    <option value="<?php echo $f1['id_distributor'] ?>" ><?php echo $f1['nama_distributor']; ?></option>
                    <?php
                }
                ?>
            </select>
        </p>
        <p>
            <select name="id_buku">
                <option value="" selected disabled>Pilih Buku</option>
                <?php
                while ($f2 = mysqli_fetch_array($q2)) {
                    ?>
                    <option value="<?php echo $f2['id_buku'] ?>" ><?php echo $f2['judul']; ?></option>
                    <?php
                }
                ?>
            </select>
        </p>
        <p><input type="number" name="jumlah" value="" placeholder="Jumlah Pasok" required></p>
        <p><input type="submit" name="tambah" value="Tambah Pasok"></p>
    </form>
</div>


<?php require 'halaman/footer.php'; ?>
