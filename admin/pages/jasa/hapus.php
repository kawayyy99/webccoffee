<?php 
include "../../lib/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_kurir WHERE id_kurir='$id'");
header("location:main.php");
?>