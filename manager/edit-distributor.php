<?php
require 'halaman/header.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $qedit = mysqli_query($mysqli, "SELECT*FROM distributor WHERE id_distributor = '$id'")or die(mysqli_error());
    $fetch = mysqli_fetch_array($qedit);
    if (mysqli_num_rows($qedit)) {
        ?>
        <div class="panel-input">
            <h1 class="judul-input">Edit Distributor</h1>
            <form action="proses/edit-dis.php" method="post">
                <p>
                    <input type="text" name="id_distributor" value="<?php echo $fetch['id_distributor'];?>" placeholder="ID Distributor (Format: DIS-Nomor Tanpa Strip)" hidden>
                </p>
                <p>
                    <label for="">Nama Distributor</label>
                    <br>
                    <input type="text" name="nama_distributor" value="<?php echo $fetch['nama_distributor'];?>" placeholder="Nama Distributor" required>
                </p>
                <p>
                    <label for="">Alamat Distributor</label>
                    <br>
                    <textarea name="alamat" rows="8" cols="50" placeholder="Alamat" required><?php echo $fetch['alamat'];?></textarea>
                </p>
                <p>
                    <label for="">Telepon</label>
                    <br>
                    <input type="text" name="telepon" value="<?php echo $fetch['telepon'];?>" placeholder="Nomor Telepon" required>
                </p>
                <p><input type="submit" name="edit" value="Edit Distributor"></p>
            </form>
        </div>
        <?php
    }
}
?>

<?php require 'halaman/footer.php'; ?>
