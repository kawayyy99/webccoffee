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
                  <h4>Menu Produk</h4>
                  <div class="card-header-action">
                    <a href="form_tambah.php" class="btn btn-danger">Tambah Produk <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">

                  <?php 
                  $no = 1;
                  $sql = "SELECT * FROM tb_produk p INNER JOIN tb_kategori k on p.id_kategori= k.Idkategori";
                  $q = mysqli_query ($koneksi, $sql);
                  ?> 
                    <table class="table table-striped">
                      <tr>
                        <th>ID Produk</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>  
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>

                      <?php 
                      while($data=mysqli_fetch_array($q)) {
                      ?>

                      <tr>
                        <td><?= $no++; ?></td>
                        <td class="font-weight-600"><?= $data['Namakategori']; ?></td>
                        <td class="font-weight-600"><?= $data['nama_produk']; ?></td>
                        <td class="font-weight-600"><?= $data['deskripsi']; ?></td>
                        <td class="font-weight-600"><?= $data['harga']; ?></td>
                        <td><img src="<?= $baseUrl; ?>pages/produk/gambar/<?=$data['gambar'];?>" height="100" width="120"></td>
                        <td>
                          <a href="form_edit.php?id=<?= $data['id_produk']; ?>"class="btn btn-warning">Edit</a>
                          <a href="hapus.php?id=<?= $data['id_produk']; ?>"onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                          class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>

                      <?php } ?>
                    
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </section>
      </div>
<?php 
include "../../footer.php"
?>