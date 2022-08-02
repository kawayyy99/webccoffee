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
<div class="row isotope-grid">
	<?php 
					include "admin/lib/koneksi.php";
                  	$sql = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                  	while ($tampil = mysqli_fetch_array($sql)){
        			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<form action="aksi cart.php" method="POST">
						<div class="block2-pic hov-img0">
							<img src="<?= $baseUrl; ?>pages/produk/gambar/<?= $tampil['gambar']; ?>" alt="IMG-PRODUCT">
								
								<input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="id" value="<?= $tampil['id_produk']; ?>">
                                <input type="hidden" name="price" value="<?= $tampil['harga'];?>">
                                <button class="btn btn-primary mr-1" type="submit">
								Add To Cart
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= $baseUrl2; ?>aksi cart.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $tampil['nama_produk']; ?>

								<span class="stext-105 cl3">Rp. 
										<?php echo $tampil['harga']; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
						</form>
					</div>
				</div>
			<?php } ?>
			</div>