<?php
include '../../lib/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_admin WHERE id_user='$id'");
header("location:main.php");
?>