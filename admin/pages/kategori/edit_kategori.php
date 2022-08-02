<?php 
include "../../lib/koneksi.php";
$Idkategori=$_POST['Idkategori'];
$Namakategori = $_POST['Namakategori'];

$sql = "UPDATE tb_kategori SET Namakategori='$Namakategori' WHERE Idkategori='$Idkategori'";

$result = mysqli_query($koneksi, $sql);

if($result){
	header('location:main.php');
}else{
	header("location:form_edit.php?id=$Idkategori");
}