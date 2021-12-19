<?php
require 'halaman/header.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $qedit = mysqli_query($mysqli, "SELECT*FROM buku WHERE id_buku = '$id'")or die(mysqli_error());
    $fetch = mysqli_fetch_array($qedit);
    if (mysqli_num_rows($qedit)) {
        ?>
        <div class="panel-input">
            <h1 class="judul-input">Edit Buku</h1>
            <form action="proses/edit-bk.php" method="post">
                <p>
                    <input type="text" name="id_buku" value="<?php echo $fetch['id_buku'] ?>" placeholder="ID Buku (Format: BK-Nomor Tanpa Strip)" hidden>
                </p>
                <p>
                    <label for="">Judul Buku</label>
                    <br>
                    <input type="text" name="judul" value="<?php echo $fetch['judul'] ?>" placeholder="Judul Buku" required>
                </p>
                <p>
                    <label for="">No. ISBN</label>
                    <br>
                    <input type="text" name="noisbn" value="<?php echo $fetch['noisbn'] ?>" placeholder="No ISBN" required>
                </p>
                <p>
                    <label for="">Penulis</label>
                    <br>
                    <input type="text" name="penulis" value="<?php echo $fetch['penulis'] ?>" placeholder="Penulis" required>
                </p>
                <p>
                    <label for="">Penerbit</label>
                    <br>
                    <input type="text" name="penerbit" value="<?php echo $fetch['penerbit'] ?>" placeholder="Penerbit" required>
                </p>
                <p>
                    <label for="">Tahun</label>
                    <br>
                    <input type="text" name="tahun" value="<?php echo $fetch['tahun'] ?>" placeholder="Tahun" required>
                </p>
                <p>
                    <label for="">Stok</label>
                    <br>
                    <input type="number" name="stok" value="<?php echo $fetch['stok'] ?>" placeholder="Stok" required>
                </p>
                <p>
                    <label for="">Harga Pokok</label>
                    <br>
                    <input type="number" name="harga_pokok" value="<?php echo $fetch['harga_pokok'] ?>" placeholder="Harga Pokok" required>
                </p>
                <p>
                    <label for="">Harga Jual</label>
                    <br>
                    <input type="number" name="harga_jual" value="<?php echo $fetch['harga_jual'] ?>" placeholder="Harga Jual" required>
                </p>
                <p>
                    <label for="">PPN</label>
                    <br>
                    <input type="number" name="ppn" value="<?php echo $fetch['ppn'] ?>" placeholder="PPN" required>%
                </p>
                <p>
                    <label for="">Diskon</label>
                    <br>
                    <input type="number" name="diskon" value="<?php echo $fetch['diskon'] ?>" placeholder="Diskon" required>%
                </p>
                <p><input type="submit" name="edit" value="Edit Buku"></p>
            </form>
        </div>

        <?php
    }
}
?>

<?php require 'halaman/footer.php'; ?>
