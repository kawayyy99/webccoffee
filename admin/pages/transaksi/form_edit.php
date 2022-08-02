<?php 
include "../../header.php";
?>
 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Form Edit Status Transaksi</h4>
                  <div class="card-header-action">
                    <a href="<?= $baseUrl; ?>admin/pages/produk/main.php" class="btn btn-danger">Kembali Ke Data Transaksi <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php 
                include "../../lib/koneksi.php";
                $invoice = $_GET['id'];
                $QueryEdit = mysqli_query($koneksi, "SELECT do.invoice as invoice, o.status_order as status FROM tb_detail_order do 
                INNER JOIN tb_order o ON do.id_order = o.id_order WHERE do.invoice = '$invoice'");
                $rowEdit = mysqli_fetch_array($QueryEdit);
                if ($rowEdit['status'] == 'P') {
                  $status = 'Dalam Proses';
              } elseif ($rowEdit['status'] == 'K') {
                  $status = 'Dalam Pengiriman';
              } elseif ($rowEdit['status'] == 'S') {
                  $status = 'Selesai';
              }
                $inv = $rowEdit['invoice'];
               
                ?>

                <form action="aksi_edit.php" method="POST">
                <div class="form-group">
                      <label>Invoice</label>
                      <input type="text" class="form-control" value="<?= $inv; ?>" disabled>
                      <input type="hidden" class="form-control" name="invoice" value="<?= $inv; ?>">
                    </div>        
                
                    <div class="form-group">

                      <div class="form-group">
                           <label for="status_pembayaran">Status Pemesanan</label>
                           <select class="form-control" name="status" id="status">
                          <option value="<?= $rowEdit['status_order']; ?>"><?= $status; ?></option>
                          <option value="P">Dalam Proses</option>
                          <option value="K">Dalam Kirim</option>
                          <option value="S">Selesai</option>
                           </select>
                        </div>        
                  </div>
                  
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
           
              </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Pesanan</h3>
                        
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th colspan="2">Items</th>
                                        <th>Nama Produk</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $QueryCart = mysqli_query($koneksi, "SELECT * FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order
                                     INNER JOIN tb_produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");
                                    while ($row = mysqli_fetch_array($QueryCart)) {
                                      
                                      
                                    ?>
                                        <tr>
                                            <td class="cart_product">
                                            <td><img src="<?= $baseUrl2; ?>admin/pages/produk/gambar/<?=$row['gambar'];?>"height="100" width="120"></td>
                                            </td>
                                            <td class="cart_description">
                                                <h4><?= $row['nama_produk'] ?></h4>
                                            </td>
                                            <td class="cart_price">
                                                <p>Rp <?= number_format($row['harga']) ?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <p><?= $row['jumlah'] ?></p>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">Rp <?= number_format($row['total']) ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
          </div>
        </section>
      </div>

