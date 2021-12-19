<?php
session_start();

if (isset($_POST['masuk'])) {
    $id_buku = $_POST['id_buku'];
    $jumlah = $_POST['jumlah'];
    if (isset($_SESSION['items'][$id_buku])) {
        if ($jumlah != 0) {
            $_SESSION['items'][$id_buku] += $jumlah;
        }else {
            $_SESSION['items'][$id_buku] += 1;
        }
    }else {
        if ($jumlah != 0) {
            $_SESSION['items'][$id_buku] += $jumlah;
        }else {
            $_SESSION['items'][$id_buku] = 1;
        }
    }
    header('location: ../index.php');
}elseif (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == "kurang") {
        $id_buku = $_GET['id_buku'];
        $_SESSION['items'][$id_buku] -= 1;
    }elseif ($aksi == "bersih") {
        if (isset($_SESSION['items'])) {
            unset($_SESSION['items'][$key]);
        }
        unset($_SESSION['items']);
    }elseif ($aksi == "hapus") {
        $id_buku = $_GET['id_buku'];
        unset($_SESSION['items'][$id_buku]);
    }
    header('location: ../index.php');
}else {
    echo "gagal";
}
?>
