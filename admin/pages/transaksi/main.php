<?php
include "../../header.php";

?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Pesanan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= $baseUrl2; ?>admin/dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item">Pesanan</div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Pesanan</h4>
                  </div>

                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                      <table class="table table-striped">
                      <tr>
                        <th>Invoice</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Username</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                      <tbody>
                                    <?php
                                    $QueryCart = mysqli_query(
                                        $koneksi,
                                        "SELECT DISTINCT invoice, total, username, tanggal FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order"
                                    );
                                    while ($row = mysqli_fetch_array($QueryCart)) {
                                    ?>
                                        <tr>
                                            <td>INV-<?= $row['invoice']; ?></td>
                                            <td>Rp <?= number_format($row['total']); ?></td>
                                            <td>
                                            <?php
                                                $invoice = $row['invoice'];
                                                $QueryItems = mysqli_query($koneksi, "SELECT DISTINCT status_order FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order INNER JOIN tb_produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                                                $rowItems = mysqli_fetch_array($QueryItems);
                                                if ($rowItems['status_order'] == 'P') {
                                                    $status = 'Proses';
                                                } elseif ($rowItems['status_order'] == 'K') {
                                                    $status = 'Kirim';
                                                } elseif ($rowItems['status_order'] == 'S') {
                                                    $status = 'Selesai';
                                                }
                                                echo $status;
                                                ?>
                                            </td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['tanggal']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning" href="<?= $baseUrl2; ?>admin/pages/transaksi/form_edit.php?id=<?php echo $row['invoice']; ?>">Edit</a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                  </div>
                  <div class="text-md-right">
                            <a class="btn btn-sm btn-info btn-flat pull-left" data-toggle="modal" data-target="#laporan">Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="laporan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Laporan Pemesanan</h4>
            </div>
            <form action="<?= $baseUrl2; ?>admin/pages/transaksi/aksi_laporan.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" name="mulai" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" name="selesai" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
      
      
<?php
include "../../footer.php";
?>