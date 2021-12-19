<?php require 'halaman/header.php'; ?>
<div class="panel-input">
    <h1 class="judul-input">Tambah Buku</h1>
    <form action="proses/tambah-bk.php" method="post">
        <p>
            <label for="">ID Buku</label>
            <br>
            <input type="text" name="id_buku" value="" placeholder="ID Buku (Format: BK-Nomor Tanpa Strip)" required>
        </p>
        <p>
            <label for="">Judul Buku</label>
            <br>
            <input type="text" name="judul" value="" placeholder="Judul Buku" required></p>
        <p>
            <label for="">No. ISBN</label>
            <br>
            <input type="text" name="noisbn" value="" placeholder="No ISBN" required>
        </p>
        <p>
            <label for="">Penulis</label>
            <br>
            <input type="text" name="penulis" value="" placeholder="Penulis" required>
        </p>
        <p>
            <label for="">Penerbit</label>
            <br>
            <input type="text" name="penerbit" value="" placeholder="Penerbit" required>
        </p>
        <p>
            <label for="">Tahun</label>
            <br>
            <input type="text" name="tahun" value="" placeholder="Tahun" required>
        </p>
        <p>
            <label for="">Stok</label>
            <br>
            <input type="number" name="stok" value="" placeholder="Stok" required>
        </p>
        <p>
            <label for="">Harga Pokok</label>
            <br>
            <input type="number" name="harga_pokok" value="" placeholder="Harga Pokok" required>
        </p>
        <p>
            <label for="">Harga Jual</label>
            <br>
            <input type="number" name="harga_jual" value="" placeholder="Harga Jual" required>
        </p>
        <p>
            <label for="">PPN</label>
            <br>
            <input type="number" name="ppn" value="" placeholder="PPN">
        </p>
        <p>
            <label for="">Diskon</label>
            <br>
            <input type="number" name="diskon" value="" placeholder="Diskon">
        </p>
        <p>
            <input type="submit" name="tambah" value="Tambah Buku">
        </p>
    </form>
</div>


<?php require 'halaman/footer.php'; ?>
