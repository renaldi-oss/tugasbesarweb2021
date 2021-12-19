<?php
session_start();
require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($mysqli, "SELECT * FROM kasir WHERE username = '$username' AND password  = '$password'");
    $fetch = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0) {
        if ($fetch['akses'] == "Kasir") {
            $_SESSION['kasir'] = $fetch['id_kasir'];
            header('location: ../kasir/');
        }else{
            $_SESSION['manager'] = $fetch['id_kasir'];
            header('location: ../manager/');
        }
    }else{
        ?>
        <script type="text/javascript">
            alert('Username dan Password tidak sesuai!');
            window.history.back();
        </script>
        <?php
    }
}else {
    ?>
    <script type="text/javascript">
        window.history.back();
    </script>
    <?php
}
?>
