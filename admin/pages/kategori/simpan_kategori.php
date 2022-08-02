<?php 
include "../../lib/koneksi.php";
$Namakategori = $_POST['Namakategori'];

$sql = "INSERT INTO tb_kategori (Namakategori) VALUES ('$Namakategori')";

$query = mysqli_query($koneksi, $sql);

if($query){
	header('location:main.php');
}else{
	header("location:form_tambah.php");
}