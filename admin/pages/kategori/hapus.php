<?php

include "../../lib/koneksi.php";
$Idkategori = $_GET['id'];

$sql = "DELETE FROM tb_kategori WHERE Idkategori='$Idkategori'";
mysqli_query($koneksi, $sql);
header("location:main.php");