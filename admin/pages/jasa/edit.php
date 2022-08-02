<?php 
include "../../lib/koneksi.php";

$id_kurir = $_POST['id_kurir'];
$nama_jasa = $_POST['nama_jasa'];

mysqli_query($koneksi,"UPDATE tb_kurir SET nama = '$nama_jasa' WHERE id_kurir ='$id_kurir'");
header("location:main.php");
?>