<?php
include "../../lib/koneksi.php";

$idProduk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$harga = $_POST['harga'];
$path = 'gambar/'.$gambar;

$queryEdit = mysqli_query($koneksi,"UPDATE tb_produk SET id_kategori='$id_kategori' , deskripsi='$deskripsi' , harga='$harga' ,
gambar='$gambar' , nama_produk='$nama_produk' WHERE id_produk='$idProduk'");

if ($queryEdit) {
    echo "<script> alert('Data Produk Berhasil Diubah'); window.location='$baseUrl'+'pages/produk/main.php';</script>";
} else {
    header("location:form_edit.php");
}
