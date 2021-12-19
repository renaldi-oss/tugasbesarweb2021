<?php
require 'halaman/header.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $akun = $_SESSION['manager'];
    $qedit = mysqli_query($mysqli, "SELECT*FROM kasir WHERE id_kasir = '$id'")or die(mysqli_error());
    $fetch = mysqli_fetch_array($qedit);
    if (mysqli_num_rows($qedit)) {
        ?>
        <div class="panel-input">
            <h1 class="judul-input">Edit Pegawai</h1>
            <form action="proses/edit-pg.php" method="post">
                <p>
                    <input type="text" name="id_kasir" value="<?php echo $fetch['id_kasir']; ?>" placeholder="ID Pegawai (Format: TB-KS/MG-Nomor Tanpa Strip)" hidden>
                </p>
                <p>
                    <label for="">Nama Pegawai</label>
                    <br>
                    <input type="text" name="nama" value="<?php echo $fetch['nama'] ?>" placeholder="Nama Lengkap" required>
                </p>
                <p>
                    <label for="">Alamat</label>
                    <br>
                    <textarea name="alamat" rows="8" cols="50" placeholder="Alamat" required><?php echo $fetch['alamat'] ?></textarea>
                </p>
                <p>
                    <label for="">Nomor Telepon</label>
                    <br>
                    <input type="text" name="telepon" value="<?php echo $fetch['telepon'] ?>" placeholder="Nomor telepon" required>
                </p>
                <p>
                    <label for="">Status Pegawai</label>
                    <br>
                    <select name="status">
                        <option value="" <?php if($fetch['status'] == ""){echo "selected";} ?> disabled>Pilih Status Pegawai</option>
                        <option value="Pegawai Tetap" <?php if($fetch['status'] == "Pegawai Tetap"){echo "selected";} ?>>Pegawai Tetap</option>
                        <option value="Magang" <?php if($fetch['status'] == "Magang"){echo "selected";} ?>>Magang</option>
                    </select>
                </p>
                <p>
                    <label for="">Username</label>
                    <br>
                    <input type="text" name="username" value="<?php echo $fetch['username'] ?>" placeholder="Username" required>
                </p>
                <p>
                    <label for="">Password</label>
                    <br>
                    <input type="text" name="password" value="<?php echo $fetch['password'] ?>" placeholder="password" required>
                </p>
                <p>
                    <label for="">Akses</label>
                    <br>
                    <select name="akses">
                        <option value="" <?php if($fetch['akses'] == ""){echo "selected";} ?> disabled>Pilih Akses Pegawai</option>
                        <option value="Kasir" <?php if($fetch['akses'] == "Kasir"){echo "selected";} ?>>Kasir</option>
                        <option value="Manager" <?php if($fetch['akses'] == "Manager"){echo "selected";} ?>>Manager</option>
                    </select>
                </p>
                <p>
                    <input type="submit" name="edit" value="Edit Pegawai"></p>
            </form>
        </div>
        <?php
    }
}
?>

<?php require 'halaman/footer.php'; ?>
