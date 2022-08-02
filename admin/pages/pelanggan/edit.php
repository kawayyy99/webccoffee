<?php
include "../../lib/koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];

$password = $_POST['password'];
$level= $_POST['level'];

mysqli_query($koneksi,"UPDATE tb_admin SET username='$nama', password='$password', level='$level' WHERE id_user='$id'");
header("location:main.php");
?>