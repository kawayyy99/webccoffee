<?php
include "admin/lib/koneksi.php";
session_start();
if (!isset($_SESSION['username']) and !isset($_SESSION['password'])) {
    include "template/header.php";
 }else {
    include "template/header_login.php";
 }
include "pages/cart.php";
include "template/footer.php";
?>