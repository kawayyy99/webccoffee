<?php
include "../../lib/koneksi.php";

$kategori = $_POST['kategori'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$path = 'gambar/'.$gambar;

mysqli_query($koneksi,"INSERT INTO tb_produk VALUES ('','$kategori','$nama_produk','$deskripsi','$harga','$gambar')");
header("location:main.php");
?>