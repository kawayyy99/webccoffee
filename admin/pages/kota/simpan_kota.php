<?php
include "../../lib/koneksi.php";

$nama_kel = $_POST['nama_kel'];
mysqli_query($koneksi, "INSERT INTO tb_kelurah VALUES ('','$nama_kel')");
header("location:main.php");
?>