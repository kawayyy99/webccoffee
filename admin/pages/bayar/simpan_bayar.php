<?php 
include "../../lib/koneksi.php";

$nama_bayar = $_POST['nama_bayar'];

mysqli_query($koneksi,"INSERT INTO tb_bayar VALUES ('','$nama_bayar')");
header("location:main.php");
?>