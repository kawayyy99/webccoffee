<?php 
include "../../lib/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_bayar WHERE id_bayar='$id'");
header("location:main.php");
?>