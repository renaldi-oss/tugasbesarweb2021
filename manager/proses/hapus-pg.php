<?php
session_start();
require 'koneksi.php';
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($_SESSION['manager'] != $id) {
        $hapus = mysqli_query($mysqli, "DELETE FROM kasir WHERE id_kasir = '$id'");
        if ($hapus) {
            header('location: ../pegawai.php');
        }
    }else{
        ?>
        <script type="text/javascript">
            alert('Anda tidak bisa menghapus akun yang sedang dipakai!');
            window.history.back();
        </script>
        <?php
    }
}

?>
