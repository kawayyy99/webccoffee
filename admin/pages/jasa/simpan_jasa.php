<?php 
include "../../lib/koneksi.php";

$nama_kurir = $_POST['nama_kurir'];

mysqli_query($koneksi,"INSERT INTO tb_kurir VALUES ('','$nama_kurir')");
header("location:main.php");
?>