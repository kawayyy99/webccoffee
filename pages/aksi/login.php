<?php
include '../../admin/lib/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
$q = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($q);
$jumlah = mysqli_num_rows($q);

if($jumlah==1) {
    session_start();
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_user'] = $data['nama_user'];
    header('location:../../index.php');
} else {
    header('location:../../authLogin.php');
}