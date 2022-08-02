<?php 
include "../../header.php";
?>

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
        
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Menu Kota</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Biaya <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php
                include '../../lib/koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"SELECT  * FROM tb_biaya_kirim WHERE id_biaya_kirim='$id'");
               while ($q=mysqli_fetch_array($data)) {
               ?>

                <form action="edit.php" method="POST">
                  <div class="form-group">
                                <label >List Kota</label>
                                    <select class="form-control" name="kota">
                                        <?php
                                        include "../../lib/koneksi.php";
                                        $QueryKota = mysqli_query($koneksi, "SELECT * FROM tb_kelurah");
                                        while ($kota = mysqli_fetch_array($QueryKota)) {

                                            if ($id_kota==$kota['id_kel']) {
                                                $select="selected";
                                            }else {
                                                $select="";
                                            }
                                        ?>
                                            <option value="<?= $kota['id_kel']; ?>" <?= $select; ?>><?= $kota['nama_kel']; ?></option>
                                        <?php } ?>
                                    </select> 
                            </div>
                     <div class="form-group">
                                <label >List Jasa</label>
                                    <select class="form-control" name="jasa">
                                        <?php
                                        include "../../lib/koneksi.php";
                                        $QueryJasa = mysqli_query($koneksi, "SELECT * FROM tb_kurir");
                                        while ($jasa = mysqli_fetch_array($QueryJasa)) {

                                            if ($id_jasa==$jasa['id_kurir']) {
                                                $select="selected";
                                            }else {
                                                $select="";
                                            }
                                        ?>
                                            <option value="<?= $jasa['id_kurir']; ?>" <?= $select; ?>><?= $jasa['nama']; ?></option>
                                        <?php } ?>
                                    </select> 
                            </div>
                    
                    <div class="form-group">
                      <label>Biaya</label>
                      <input type="text" class="form-control" name="biaya" value="<?= $q['biaya'];?>">
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