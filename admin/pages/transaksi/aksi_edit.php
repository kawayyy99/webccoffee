<?php
    include "../../lib/koneksi.php";

    $invoice = $_POST['invoice'];
    $status = $_POST['status'];

    $QueryDO = mysqli_query($koneksi, "SELECT id_order FROM tb_detail_order WHERE invoice = '$invoice'");
    while ($row = mysqli_fetch_array($QueryDO)) {
        $id_order = $row['id_order'];
        $QueryEdit = mysqli_query($koneksi, "UPDATE tb_order SET status_order = '$status' WHERE id_order = '$id_order'");
        if ($QueryEdit) {
            echo "
            <script>
                alert('Data berhasil dirubah');
                window.location = '$baseUrl2'+'admin/pages/transaksi/main.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal dirubah');
                window.location = '$baseUrl2'+'admin/pages/transaksi/form_edit.php';
            </script>";
        }
    }
