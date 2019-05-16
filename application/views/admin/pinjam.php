<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Pinjam</h3>
            </div>
            <div class="card-body">
            <?= form_open_multipart('') ?>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <?php
                        $this->db->select('nama');
                        $angg=$this->db->get('anggota')->result();
                    ?>
                    <label>Nama Peminjam</label>
                    <input type="text" class="form-control" list="browsers" id="nama" autocomplete="off" required placeholder="Masukan Nama peminjam">
                    <datalist id="browsers">
                      <?php foreach($angg as $u){?>
                        <option value="<?php echo $u->nama ?>">
                      <?php }?>
                    </datalist>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                     <label>Kode Pinjam</label>
                     <input type="text" id="kode_pjm" class="form-control" disabled>
                     <input type="hidden" name="kd_pjm" id="kd_pjm">
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <label>NIP</label>
                    <input type="text" value="" class="form-control" id="nip" disabled>
                    <input type="hidden" name="nip" id="nip1">
                  </div>
                  <div class="col">
                    <label>Bidang</label>
                    <input type="text" class="form-control" id="bidang" disabled>
                    <input type="hidden" name="bidang" id="bidang1">
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <label>Tanggal Pinjam</label>
                    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="tgl_pjm" id="tgl_pjm" class="form-control">
                  </div>
                  <div class="col">
                    <?php
                      $datetime = new DateTime(date('Y-m-d'));
                      $datetime->add(new DateInterval('P7D'));
                    ?>
                    <label>Estimasi Kembali</label>
                    <input type="date" value="<?= $datetime->format('Y-m-d'); ?>" name="estimasi" id="esti" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col tombol-pjm">
                  </div>
                </div>
              </div>
            <?= form_close() ?>
            </div>
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pinjam</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered list">
                <thead>
                <tr>
                  <th style="width:10px;">No</th>
                  <th>Kode</th>
                  <th>Barang</th>
                  <th>Merk</th>
                </tr>
                </thead>
                <tbody id="isi-table">
                  <tr id="blank">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              
            </div>
            
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--  -->
        <div class="modal-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merk</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $brg=$this->db->get('barang')->result();
                  ?>
                  <?php
                    foreach($brg as $row){ ?>
                      <tr>
                        <td><?= $row->kd_brg ?></td>
                        <td style="cursor:pointer;">
                          <a href="#">
                            <?= $row->nm_brg ?>
                          </a>
                        </td>
                        <td><?php
                            echo $this->db->get_where('kategori',array('id'=>$row->kategori))->row_array()['kat'];
                        ?></td>
                        <td><?= $row->merk ?></td>
                        <?php
                            if($row->status==1){
                                echo '<td style="color:green;">Tersedia</td>';
                            }else{
                                echo '<td style="color:red;">Terpinjam</td>';
                            }
                        ?>
                        <td>
                          <?php if($row->status==1){ ?>
                            <button type="button" id="p_<?= $row->id ?>" data-id="<?= $row->id ?>" class="pilih btn btn-info btn-sm" data-dismiss="modal">
                              Pilih
                            </button>
                          <?php }else{ ?>
                            <button style="cursor:not-allowed;" class="btn btn-secondary btn-sm" title="BARANG TIDAK BISA DI PINJAM">
                              Pilih
                            </button>
                          <?php } ?>
                        </td>
                      </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merk</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!--  -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>
