<section class="portfolio" id="portfolio">
    <div class="container">
      <h3 class="text-center text-secondary mb-10">Daftar Barang</h3>
      <div class="row">
        <div class="col-lg-8">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Status</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $i=1; foreach($tabel_record as $row){ ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row->kd_brg ?></td>
                        <td><?php echo $row->nm_brg ?></td>
                        <td><?php echo $row->merk ?></td>
                        <?php 
                          if($row->status==1){
                            echo "<td style='color:green;'>Tersedia</td>";
                          }else{
                            echo "<td style='color:red;'>Terpinjam</td>";
                          }
                        ?>
                      <?php $i++; ?>
                    </tr>
                  <?php } ?>
                </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Status</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-lg-4">
          
          
          
        </div>
      </div>
    </div>
  </section>
