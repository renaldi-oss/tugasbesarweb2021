<?php
session_start();
require 'koneksi.php';

if (isset($_GET['logout'])) {
    unset($_SESSION['manager']);
    session_destroy();
    header('location: ../../index.php');
}else {
    ?>
    <script type="text/javascript">
        window.history.back();
    </script>
    <?php
}
?>
