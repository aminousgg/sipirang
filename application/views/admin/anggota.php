<?php
  if($this->session->flashdata('error')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.'Gagal Menambahkan'.'",
                  text: "'.$this->session->flashdata('error').'",
                  timer: 10000,
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
  if($this->session->flashdata('success')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'success'.'",
                  title: "'.'Berhasil'.'",
                  text: "'.$this->session->flashdata('success').'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-2">
                    <h3 class="card-title">Data Anggota</h3>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah">
                        Tambah
                    </button>
                </div>
              </div>
                

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Bidang</th>
                  <th>Gol</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                      foreach($table as $row){ ?>
                      <?php
                        if($row->nip==$this->session->userdata('session')['nip']){
                          continue;
                        }
                      ?>
                      <tr>
                        <td><?= $row->nip ?></td>
                        <td style="cursor:pointer;" data-id="<?= $row->id ?>" id="a_detail" data-toggle="modal" data-target="#detail">
                          <a href="#"><?= $row->nama ?></a>
                        </td>
                        <td><?= $row->tmp_lahir.", ".$row->tgl_lahir ?></td>
                        <td><?= $row->bidang ?></td>
                        <td><?= $row->golongan ?></td>
                        <td>
                          <button type="button" data-id="<?= $row->id ?>" data-toggle="modal" data-target="#edit" class="edit_agt btn btn-info btn-sm">
                            <i class="fa fa-pencil-square-o"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href = '<?= base_url() ?>admin/del_agt/<?= $row->id ?>'">
                            <i class="fa fa-trash-o"></i>
                          </button>
                        </td>
                      </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Bidang</th>
                  <th>Gol</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- modal tambah -->
            <div class="modal w3-animate-zoom" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?= form_open_multipart('admin/add_agt') ?>
                  <div class="modal-body">
                  <div class="form-group">
                      <div class="row">
                        <div class="col">
                            <label>NIP</label>
                            <input name="nip" placeholder="NIP" type="text" class="form-control" required>
                          </div>
                          <div class="col">
                            <label>Nama</label>
                            <input name="nama" placeholder="Nama" type="text" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Tempat</label>
                            <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control" required>
                          </div>
                          <div class="col">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" required>
                          </div>
                        </div>
                      </div>                          
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Jabatan</label>
                            <input name="jabatan" placeholder="Jabatan" type="text" class="form-control" required>
                          </div>
                          <div class="col">
                            <label>Golongan</label>
                            <input name="gol" placeholder="Golongan" type="text" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Bidang</label>
                            <input type="text" name="bid" class="form-control" placeholder="Bidang" required>
                          </div>
                          <div class="col">
                            <label style="color:green;">Level User</label>
                            <select name="level" class="form-control" required>
                              <option hidden value="">Pilih Level</option>
                              <option value="2">Admin</option>
                              <option value="1">Petugas</option>
                              <option value="0">Biasa</option>
                            </select>
                          </div>
                          <div class="col">
                            <label>Gambar</label><br>
                            <input type="file" name="file" id="file" required>
                            <div class="kotakUp" id="gambar">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
            <!-- /.modal tambah -->
            <!-- modal edit -->
          </div>
        </div>
</div>
            <div class="modal w3-animate-zoom" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?= form_open_multipart('admin/edit_agt') ?>
                  <div class="modal-body">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                            <label>NIP</label>
                            <input type="hidden" name="id_agt" id="id_agt">
                            <input name="nip" id="nip" placeholder="NIP" type="text" class="form-control" required>
                          </div>
                          <div class="col">
                            <label>Nama</label>
                            <input name="nama" id="nama" placeholder="Nama" type="text" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Tempat</label>
                            <input type="text" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir" class="form-control" required>
                          </div>
                          <div class="col">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                          </div>
                        </div>
                      </div>                          
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Jabatan</label>
                            <input name="jabatan" id="jabatan" placeholder="Jabatan" type="text" class="form-control" required>
                          </div>
                          <div class="col">
                            <label>Golongan</label>
                            <input name="gol" id="gol" placeholder="Golongan" type="text" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Bidang</label>
                            <input type="text" id="bid" name="bid" class="form-control" placeholder="Bidang" required>
                          </div>
                          <div class="col">
                            <label style="color:green;">Level User</label>
                            <select name="level" id="level" class="form-control" required>
                              <option hidden value="">Pilih Level</option>
                              <option value="2">Admin</option>
                              <option value="1">Petugas</option>
                              <option value="0">Level</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>

            <!-- modal detail -->
            <div class="modal efek" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div style="width:600px;" class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-4">
                        NIP<br>
                        Nama<br>
                        Jabatan<br>
                        Pangkat<br>
                        Bidang<br>
                        TTL<br>
                        Level<br>
                      </div>
                      <div class="col-md-4">
                        &nbsp;:&nbsp;<a id="d_nip"></a><br>
                        &nbsp;:&nbsp;<a id="d_nama"></a><br>
                        &nbsp;:&nbsp;<a id="d_jab"></a><br>
                        &nbsp;:&nbsp;<a id="d_gol"></a><br>
                        &nbsp;:&nbsp;<a id="d_bid"></a><br>
                        &nbsp;:&nbsp;<a id="ttl"></a><br>
                        &nbsp;:&nbsp;<a id="d_level"></a><br>
                      </div>
                      <div class="col-md-4">
                        <img id="gmbr_a" width="128px" height="110px;" alt="gambar 404">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    
                  </div>
                </div>
              </div>
            </div>
            