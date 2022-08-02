<?php
include "../../lib/koneksi.php";

$id_kel = $_POST['id_kel'];
$nama_kel = $_POST['nama_kel'];

mysqli_query($koneksi,"UPDATE tb_kelurah SET nama_kel='$nama_kel' WHERE id_kel='$id_kel'");
header("location:main.php");

?>