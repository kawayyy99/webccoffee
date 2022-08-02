<?php
include "../../admin/lib/koneksi.php";

$username = $_POST['username'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$kelurahan = $_POST['kelurahan'];
$QuerySimpan = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('','$username','$nama','$alamat','$password','$kelurahan')");
if ($QuerySimpan) {
   
	echo "<script>
    alert ('Anda Berhasil Regis,Silahkan Login');
    document.location.href = '$baseUrl2'+'authLogin.php';
    </script>
    ";

}else {
    echo "<script>
    alert ('Anda  Tidak Berhasil Regis');
    document.location.href = '$baseUrl2'+'authRegister.php';
    </script>
    ";
}
?>