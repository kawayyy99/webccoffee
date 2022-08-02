<?php 

$baseUrl = 'http://localhost/Coffee/admin/';
$baseUrl2 = 'http://localhost/Coffee/';
$koneksi = mysqli_connect("localhost", "root", "", "coffee");

if (!$koneksi) {
    die('Gagal Terhubung ke MySQL: '.mysqli_connect_error());
}
?>