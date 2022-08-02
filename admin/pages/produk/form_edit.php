<?php
include "../../header.php";
include "../../lib/koneksi.php";

$id=$_GET['id'];
$queryEdit=mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$id=$hasilQuery['id_produk'];  
$id_kategori = $hasilQuery['id_kategori'];
$nama_produk=$hasilQuery['nama_produk'];
$harga=$hasilQuery['harga'];
$deskripsi=$hasilQuery['deskripsi'];
$gambar = $hasilQuery['gambar'];

?>
 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
         
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Manajemen Produk</h4>
                  <div class="card-header-action">
                    <a href="<?= $baseUrl; ?>admin/pages/produk/main.php" class="btn btn-danger">Kembali ke Data Produk <i class="fas fa-chevron-left"></i></a>
                  </div>
                </div>
                <?php
                include "../../lib/koneksi.php";
                $id= $_GET['id'];
                $QueriProduk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id'");
                while($q=mysqli_fetch_array($QueriProduk)){

                
                ?>
                <div class="card-body">
                    <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_produk" value="<?php echo $id; ?>">
                        <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="hidden" name="nama_produk" value="<?php echo $q['nama_produk']; ?>">
                        <input type="text" class="form-control" name="nama_produk" value="<?= $q['nama_produk']; ?>">
                        </div>

                        <div class="form-group">
                        <label>Kategori</label>
                        <?php
                        include "../../lib/koneksi.php";
                        $sql = "SELECT * FROM tb_kategori";
                        $res = mysqli_query($koneksi, $sql);
                        ?>
                        <select class="form-control" name="id_kategori">
                        <?php
                        while($data= mysqli_fetch_array($res)) {
                          ?>
                          <option value="<?= $data['Idkategori']; ?>"><?=$data['Namakategori']; ?></option>
                        <?php } ?>
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="hidden" name="deskripsi" value="<?php echo $q['deskripsi']; ?>">
                        <input type="text" class="form-control" name="deskripsi" value="<?= $q['deskripsi']; ?>">
                        </div>

                        <div class="form-group">
                        <label>Harga</label>
                        <input type="hidden" name="harga" value="<?php echo $q['harga']; ?>">
                        <input type="text" class="form-control" name="harga" value="<?= $q['harga']; ?>">
                        </div>

                        <div class="form-group">
                        <label>Gambar</label>
                        <img src="<?= $baseUrl; ?>pages/produk/gambar/<?= $q['gambar'];  ?>" class="img img-fluid mb-1">
                        <input type="file" id="gambar" name="gambar" >
                        </div>

                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </form>
            <?php } ?>
                </div>
              </div>
            </div>
        </section>
      </div>
<?php
include "../../footer.php";
?>