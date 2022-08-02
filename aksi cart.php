<?php
session_start();
include "admin/lib/koneksi.php";

$id = $_POST['id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$sid = session_id();
$_SESSION['card'] = $sid;

$QuesryCheck = mysqli_query($koneksi, "SELECT id_produk FROM tb_order WHERE id_produk = '$id' AND id_session = '$sid' AND status_order = 'C'");
$CheckCart = mysqli_num_rows($QuesryCheck);

if ($CheckCart == 0) {
    $QueryAdd = mysqli_query($koneksi, "INSERT INTO tb_order VALUES ('', 'C', '$id', '$quantity', '$price', '$sid')");
} else {
    $QueryUpdate = mysqli_query($koneksi, "UPDATE tb_order SET jumlah = jumlah+'$quantity' WHERE id_produk = '$id' AND id_session = '$sid'");
}
header('location:cart.php');
