<?php
include "../../lib/koneksi.php";

$mulai = date('d/m/Y', strtotime($_POST['mulai']));
$selesai = date('d/m/Y', strtotime($_POST['selesai']));
?>

<?php
header("Content-type: application/octet-stream");
header("Pragma: no-cache");
header("Expires: 0");
header("Content-Disposition: attachment; filename=Laporan Penjualan Planet Coffee.xls");
?>

<h4>Laporan data pemesanan</h4>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Invoice</th>
            <th>Total</th>
            <th>Status</th>
            <th>Username</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        $QueryDate = mysqli_query(
            $koneksi,
            "SELECT DISTINCT invoice, total, username, tanggal FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order WHERE do.tanggal BETWEEN '$mulai' AND '$selesai'"
        );
        while ($row = mysqli_fetch_array($QueryDate)) { ?>
            <tr>
                <td><?= $id; ?></td>
                <td>No-<?= $row['invoice']; ?></td>
                <td>Rp <?= number_format($row['total']); ?></td>
                <td>
                    <?php
                    $invoice = $row['invoice'];
                    $QueryItems = mysqli_query($koneksi, "SELECT DISTINCT status_order FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order INNER JOIN tb_produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                    $rowItems = mysqli_fetch_array($QueryItems);
                    if ($rowItems['status_order'] == 'P') {
                        $status = 'Dalam Proses';
                    } elseif ($rowItems['status_order'] == 'K') {
                        $status = 'Dalam Pengiriman';
                    } elseif ($rowItems['status_order'] == 'S') {
                        $status = 'Selesai';
                    }
                    echo $status;
                    ?>
                </td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['tanggal']; ?></td>
            </tr>
        <?php $id++;
        } ?>
    </tbody>
</table>