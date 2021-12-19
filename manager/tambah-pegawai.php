<?php require 'halaman/header.php'; ?>
<div class="panel-input">
    <h1 class="judul-input">Tambah Pegawai</h1>
    <form action="proses/tambah-pg.php" method="post">
        <p>
            <label for="">ID Kasir</label>
            <br>
            <input type="text" name="id_kasir" value="" placeholder="ID Pegawai (Format: TB-KS/MG-Nomor Tanpa Strip)">
        </p>
        <p>
            <label for="">Nama Lengkap</label>
            <br>
            <input type="text" name="nama" value="" placeholder="Nama Lengkap">
        </p>
        <p>
            <label for="">Alamat</label>
            <br>
            <textarea name="alamat" rows="8" cols="50" placeholder="Alamat"></textarea>
        </p>
        <p>
            <label for="">Telepon</label>
            <br>
            <input type="text" name="telepon" value="" placeholder="Nomor telepon">
        </p>
        <p>
            <label for="">Status Pegawai</label>
            <br>
            <select name="status">
                <option value="" selected disabled>Pilih Status Pegawai</option>
                <option value="Pegawai Tetap">Pegawai Tetap</option>
                <option value="Magang">Magang</option>
            </select>
        </p>
        <p>
            <label for="">Username</label>
            <br>
            <input type="text" name="username" value="" placeholder="Username">
        </p>
        <p>
            <label for="">Password</label>
            <br>
            <input type="text" name="password" value="" placeholder="Password">
        </p>
        <p>
            <label for="">Akses</label>
            <br>
            <select name="akses">
                <option value="" selected disabled>Pilih Akses Pegawai</option>
                <option value="Kasir">Kasir</option>
                <option value="Manager">Manager</option>
            </select>
        </p>
        <p><input type="submit" name="tambah" value="Tambah Pegawai"></p>
    </form>
</div>

<?php require 'halaman/footer.php'; ?>
