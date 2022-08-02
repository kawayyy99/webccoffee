<?php 
$sid = session_id();
?>
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
        </div>
      </div>
    </div>
  </div>
          <div class="checkout__form">
               <h4><b>Checkout Details</b></h4>
               <br>
               <?php
                $username = $_SESSION['username'];
                $QueryProfile = mysqli_query($koneksi, "SELECT * FROM tb_user tm INNER JOIN tb_kelurah tk ON tm.id_kelurahan = tk.id_kel WHERE tm.username = '$username'");
                $row = mysqli_fetch_assoc($QueryProfile);
                ?>
               <form method="POST" action="<?= $baseUrl2; ?>pages/aksi/shipping.php">
                   <div class="row">
                       <div class="col-lg-8 col-md-6">
                           <div class="row">

                           </div>
                           <div class="checkout__input">
                               <p><b>Nama<span>*</span></b></p>
                               <input type="text" class="form-control" name="nama" value="<?= $row['nama_user']; ?>" disabled>
                           </div>
                           <br>
                           <div class="checkout__input">
                               <p><b>Alamat<span>*</span></b></p>
                               <input type="text" placeholder="Street Address" name="alamat" class="checkout__input__add" value="<?= $row['alamat']; ?>" disabled>

                           </div>
                           <br>
                           <div class="checkout__input">
                               <p><b>Kelurahan<span>*</span></b></p>
                               <input type="text" class="form-control" name="kota" value="<?= $row['nama_kel']; ?>" disabled>
                           </div>
                           <br>
                           <div class="row">
                               
                               <div class="col-lg-6">
                                   <div class="checkout__input">
                                       <p><b>Username<span>*</span></b></p>
                                       <input type="text" name="username" value="<?= $row['username']; ?>" disabled>
                                   </div>
                               </div>
                               <br>
                               <br>

                               <div class="col-lg-12">
                                   <p><b>Kurir<span>*</span></b></p>
                                   <div class="checkout__input">
                                       <select name="kurir">
                                           <option value="">-- Pilih Kurir Pengiriman --</option>
                                           <?php
                                            include 'admin/lib/koneksi.php';
                                            $qKurir = mysqli_query($koneksi, "SELECT * FROM tb_kurir");
                                            while ($k = mysqli_fetch_array($qKurir)) {
                                            ?>
                                               <option value="<?= $k['id_kurir'] ?>"><?= $k['nama'] ?></option>
                                           <?php } ?>
                                       </select>

                                   </div>
                               </div>
                           </div>
                           <br>

                           <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              ---Choose a Courier---
            </button>
                       </div>
                       </form>
                       <?php
                        $sid = $_SESSION['card'];

                        include "admin/lib/koneksi.php";

                        $QueryCheckout = mysqli_query($koneksi, "SELECT * FROM tb_order tbo INNER JOIN tb_produk tp ON tbo.id_produk = tp.id_produk
                                WHERE tbo.id_session = '$sid' AND tbo.jumlah > 0 AND tbo.status_order = 'C'");

                        ?>
                       <div class="col-lg-4 col-md-6">
                           <div class="checkout__order">
                               <h4><b>Your Order</b></h4>
                               <br>
                               <div class="checkout__order__products"><b>Products <span>Total</span></b></div>
                               <br>
                               <ul>
                                   <?php
                                    while ($Checkout = mysqli_fetch_array($QueryCheckout)) {
                                    ?>
                                       <li><?= $Checkout['nama_produk']; ?><span> Rp. <?= number_format($Checkout['harga'] * $Checkout['jumlah']); ?></span></li>
                                   <?php } ?>
                               </ul>

                               <?php
                                include "admin/lib/koneksi.php";
                                $sid = $_SESSION['card'];

                                $QueryCart = mysqli_query($koneksi, "SELECT * FROM tb_order tbo INNER JOIN tb_produk tp ON tbo.id_produk = tp.id_produk
                      WHERE tbo.id_session = '$sid'");
                                $total = 0;
                                while ($Cart = mysqli_fetch_array($QueryCart)) {
                                    $subtotal = $Cart['harga'] * $Cart['jumlah'];
                                    $total = $total + $subtotal;
                                }
                                ?>
                                <br>
                               <div class="checkout__order__subtotal">Subtotal <span>Rp. <?= number_format($subtotal); ?></span></div>

                               <?php

                                $sid = $_SESSION['card'];

                                include "admin/lib/koneksi.php";
                                if (!empty($_SESSION['tempKurir'])) {
                                    $idkurir = $_SESSION['tempKurir'];
                                } else {
                                    $idkurir = 0;
                                }

                                $QueryProfile = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
                                $rowUser = mysqli_fetch_assoc($QueryProfile);
                                $kota = $rowUser['id_kelurahan'];

                                $QueryOngkir =  mysqli_query($koneksi, "SELECT * FROM tb_biaya_kirim tbo INNER JOIN tb_kurir tbk
                 ON tbo.id_kurir = tbk.id_kurir INNER JOIN tb_kelurah tbkota ON tbo.id_kel = tbkota.id_kel
                WHERE tbo.id_kurir = '$idkurir' AND tbo.id_kel = '$kota'");
                                $rowOngkir = mysqli_fetch_array($QueryOngkir);

                                $QueryOrder = mysqli_query($koneksi, "SELECT SUM(jumlah*harga) as subtotal FROM tb_order WHERE id_session = '$sid' AND status_order = 'C'");
                                $rowOrder = mysqli_fetch_assoc($QueryOrder);

                                $subtotal = $rowOrder['subtotal'];
                                $total = $rowOrder['subtotal'] + $rowOngkir['biaya'];
                                ?>
                               <div class="checkout__order__subtotal">Ongkir <span><?php if (!empty($_SESSION['tempKurir'])) { ?>
                                           <td>Rp <?= number_format($rowOngkir['biaya']) ?></td>
                                       <?php } else { ?>
                                           <td>Rp 0</td>
                                       <?php } ?></span></div>
                               <div class="checkout__order__total" name="total"><b>Total <span>Rp. <?= number_format($total); ?></span></b></div>
                               <?php
                                include "admin/lib/koneksi.php";
                                $pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_bayar");
                                while ($p = mysqli_fetch_array($pembayaran)) {
                                ?>
                                   <div class="bank">
                                       <div class="bank-item pb-3">
                                           <div class="description">
                                            <br>
                                            <br>

                                               <h5><b>Planet Coffee</b></h5>
                                               <br>
                                               <p><i>Method Payment</i>
                                                <br>
                                                   <i><b><?= $p['nama_bayar']; ?></b></i>
                                                   <br>
                                               </p>
                                           </div>
                                           <br>
                                       <?php } ?>
                                       </div>

                                       <form method="POST" action="<?= $baseUrl2; ?>pages/aksi/checkout.php">
                                           <input type="hidden" name="total" value="<?= $total ?>">
                                           <input type="hidden" name="id_jasa" value="<?= $_SESSION['tempKurir'] ?>">
                                          <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              Finish Proccesed
            </button>
                                           <br>
                                           <br>
                                       </form>
                                   </div>

                           </div>
               <!-- </form> -->
           </div>
       </div>
   </section>
   <!-- Checkout Section End -->