<?php require 'halaman/header.php'; ?>
<div class="panel-input">
    <h1 class="judul-input">Tambah Distributor</h1>
    <form action="proses/tambah-dis.php" method="post">
        <p>
            <label for="">ID Distributor</label>
            <br>
            <input type="text" name="id_distributor" value="" placeholder="ID Distributor (Format: DIS-Nomor Tanpa Strip)" required>
        </p>
        <p>
            <label for="">Nama Distributor</label>
            <br>
            <input type="text" name="nama_distributor" value="" placeholder="Nama Distributor" required>
        </p>
        <p>
            <label for="">Alamat</label>
            <br>
            <textarea name="alamat" rows="8" cols="50" placeholder="Alamat" required></textarea>
        </p>
        <p>
            <label for="">Telepon</label>
            <br>
            <input type="text" name="telepon" value="" placeholder="Nomor Telepon" required>
        </p>
        <p>
            <input type="submit" name="tambah" value="Tambah Distributor">
        </p>

    </form>
</div>

<?php require 'halaman/footer.php'; ?>
