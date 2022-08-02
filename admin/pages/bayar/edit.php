<?php 
include "../../lib/koneksi.php";

$id_kurir = $_POST['id_bayar'];
$nama_bayar = $_POST['nama_bayar'];

mysqli_query($koneksi,"UPDATE tb_bayar SET nama_bayar = '$nama_bayar' WHERE id_bayar ='$id_kurir'");
header("location:main.php");
?>