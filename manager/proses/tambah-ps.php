<?php
require 'koneksi.php';
if (isset($_POST['tambah'])) {
    $id_distributor = $_POST['id_distributor'];
    $id_buku = $_POST['id_buku'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date('Y-m-d');

    if ($id_distributor == "" || $id_buku == "") {
        ?>
        <script type="text/javascript">
            alert('Data masih ada yang kosong');
            window.history.back();
        </script>
        <?php
    }else{
        $query = mysqli_query($mysqli, "INSERT INTO pasok(id_distributor,id_buku,jumlah,tanggal)
        VALUES('$id_distributor','$id_buku','$jumlah','$tanggal')")or die(mysqli_error());
        if ($query) {
            header('location: ../pasok.php');
        }
    }

}

?>
