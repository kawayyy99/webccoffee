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
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">

                  <?php 
                  $no = 1;
                  $sql = "SELECT * FROM tb_user p INNER JOIN tb_kelurah k on p.id_kelurahan= k.id_kel";
                  $q = mysqli_query ($koneksi, $sql);
                  ?> 
                    <table class="table table-striped">
                      <tr>
                        <th>Id Customer</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Password</th>  
                        <th>Kelurahan</th>
                      </tr>

                      <?php 
                      while($data=mysqli_fetch_array($q)) {
                      ?>

                      <tr>
                        <td><?= $no++; ?></td>
                        <td class="font-weight-600"><?= $data['username']; ?></td>
                        <td class="font-weight-600"><?= $data['nama_user']; ?></td>
                        <td class="font-weight-600"><?= $data['alamat']; ?></td>
                        <td class="font-weight-600"><?= $data['password']; ?></td>
                        <td class="font-weight-600"><?= $data['nama_kel']; ?></td>
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