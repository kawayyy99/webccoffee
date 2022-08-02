<?php 
include "../../lib/koneksi.php";

$id = $_POST['id'];
$kota = $_POST['kota'];
$jasa = $_POST['jasa'];
$biaya = $_POST['biaya'];

mysqli_query($koneksi,"UPDATE tb_biaya_kirim SET id_kel='$kota', biaya='$biaya', id_kurir='$jasa' WHERE id_biaya_kirim='$id'");
header("location:main.php");