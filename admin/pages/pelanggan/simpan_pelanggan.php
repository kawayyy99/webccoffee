<?php 
include "../../lib/koneksi.php";

$nama = $_POST['nama'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($koneksi,"INSERT INTO tb_admin VALUES ('','$nama','$password','$level')");
header("location:main.php");
?>