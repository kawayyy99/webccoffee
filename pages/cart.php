<?php 
$sid = session_id();
?>
<!-- Cart -->

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			

			
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php
								 $sid = session_id();
								include "admin/lib/koneksi.php";
						$QueryCart = mysqli_query($koneksi, "SELECT * FROM tb_order tbo INNER JOIN tb_produk tp ON tbo.id_produk = tp.id_produk
                                WHERE tbo.id_session = '$sid' AND tbo.jumlah > 0 AND tbo.status_order = 'C'");
						$total = 0;
                                while ($r = mysqli_fetch_array($QueryCart)) {
                                	$subtotal = $r['harga'] * $r['jumlah'];
                                	$total = $total + $subtotal;
						?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?= $baseUrl; ?>pages/produk/gambar/<?php echo $r['gambar']; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $r['nama_produk'] ?></td>
									<td class="column-3">Rp. <?php echo number_format($r['harga']); ?></td>
									</td>
									<td class="column-5"><?= $r['jumlah'] ?></td>
									<td class="column-6">Rp. <?= number_format($r['harga'] * $r['jumlah']); ?></td>
								</tr>
<?php }?>
							</table>
						
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Again
								</a>
						</div>
					</div>
				</div>



				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<?php 
						 $username = $_SESSION['username'];
						 $QueryProfile = mysqli_query($koneksi, "SELECT * FROM tb_user tu INNER JOIN tb_kelurah tk on tu.id_kelurahan = tk.id_kel WHERE tu.username = '$username'");
						 $row = mysqli_fetch_assoc($QueryProfile);
						?>
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-209">
							

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<p><span class="stext-112 cl8">Nama*</span></p>
                               <input type="text" class="form-control" name="nama" value="<?= $row['nama_user']; ?>" disabled>
							</div>

							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<p><span class="stext-112 cl8">Alamat*</span></p>
                               <input type="text" placeholder="Street Address" name="alamat" class="checkout__input__add" value="<?= $row['alamat']; ?> <?= $row['nama_kel']; ?>" disabled>
							</div>
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							</div>
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										</div>
							</div>
									<div class="flex-w">
									</div>
									</div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									Rp. <?= number_format($total); ?>
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							<a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
						</button>
					</div>
				</div>
			</div>
		</div>