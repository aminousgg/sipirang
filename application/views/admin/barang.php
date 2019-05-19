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
                <div class="col-md-6">

                <form>
                  <div class="form-row">
                    <div class="col-6 my-1">
                      <label class="sr-only" for="inlineFormInputGroupUsername">Kategori</label>
                      <div class="input-group">
                        <select id="s_kat" class="form-control">
                          <option hidden >Kategori</option>
                          <option value="">All</option>
                          <?php
                            $kat=$this->db->get('kategori')->result();
                            foreach($kat as $u){
                              echo '<option value="'.$u->id.'">'.$u->kat.'</option>';
                            }
                          ?>
                        </select>
                        <div id="src_kat" style="cursor:pointer;" class="input-group-prepend">
                          <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>

                </div>
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah">
                      <i class="fa fa-plus"></i> Barang
                    </button>
                    <!-- <a href="<?= base_url() ?>Export/barang_pdf">
                      pdf
                    </a> -->
                </div>
              </div>
                

            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                    foreach($table as $row){ ?>
                      <tr>
                        <td><?= $row->kd_brg ?></td>
                        <td style="cursor:pointer;" data-id="<?= $row->id ?>" id="detail" data-toggle="modal" data-target="#tambah1">
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
                          <button type="button" data-id="<?= $row->id ?>" data-toggle="modal" data-target="#edit" class="edit_brg btn btn-info btn-sm" title="Edit">
                            <i class="fa fa-pencil-square-o"></i>
                          </button>
                          <?php if($row->status==1){ ?>
                            <button type="button" data-id="<?= $row->id ?>" data-sts="<?= $row->status ?>" class="hps-brg btn btn-danger btn-sm" title="Hapus">
                              <i class="fa fa-trash-o"></i>
                            </button>
                          <?php }else{ ?>
                            <button style="cursor:not-allowed;" class="btn btn-danger btn-sm" title="BARANG TIDAK BISA DI HAPUS KRN MASIH TERPINJAM">
                              <i class="fa fa-trash-o"></i>
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
            <!-- /.card-body -->
            <!-- modal tambah -->
            <div class="modal w3-animate-zoom" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?= form_open_multipart('admin/add_brg') ?>
                  <div class="modal-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Kode Barang</label>
                            <input disabled placeholder="Nama Barang" id="kd_brg" type="text" class="form-control">
                            <input type="hidden" id="kode" name="kd_brg">
                          </div>
                          <div class="col">
                            <label>Nama Barang</label>
                            <input name="nm_brg" placeholder="Nama Barang" type="text" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Merk</label>
                            <input name="merk" placeholder="Merk" type="text" class="form-control">
                          </div>
                          <div class="col">
                            <label>Kategori</label>
                            <!-- <input name="kategori" placeholder="Kategori" type="text" class="form-control"> -->
                            <select name="kategori" class="form-control">
                              <option hidden value="">Pilih Kategori</option>
                              <?php
                                $kat=$this->db->get('kategori')->result();
                                foreach($kat as $u){
                                    echo '<option value="'.$u->id.'">'.$u->kat.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                            
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Tgl Masuk</label>
                            <input name="tgl_masuk" type="date" class="form-control">
                          </div>
                          <div class="col">
                            <label>Spesifikasi</label>
                            <textarea name="spek" class="form-control" cols="30" rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                      <div style="margin-top:-75px;" class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Upload Foto</label>
                            <input type="file" name="file" id="file" require>
                            <div class="kotakUp" id="gambar">
                              <p id="pesaneror" style="color:red;"></p>
                            </div>
                          </div>
                          <div class="col"></div>
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
            <div class="modal w3-animate-zoom" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?= form_open_multipart('admin/edit_brg') ?>
                  <div class="modal-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Nama Barang</label>
                            <input type="hidden" id="id_brg" name="id_brg">
                            <input name="nm_brg" id="e_nm_brg" type="text" class="form-control">
                          </div>
                          <div class="col">
                            <label>Merk</label>
                            <input name="merk" id="e_merk" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                            
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Kategori</label>
                            <!-- <input name="kategori" placeholder="Kategori" type="text" class="form-control"> -->
                            <select name="kategori" id="e_kate" class="form-control">
                              <option hidden value=""></option>
                              <?php
                                $kat=$this->db->get('kategori')->result();
                                foreach($kat as $u){
                                    echo '<option value="'.$u->id.'">'.$u->kat.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <label>Tgl Masuk</label>
                            <input name="tgl_masuk" id="e_tgl_masuk" type="date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Spesifikasi</label>
                        <input type="text" name="spek" id="e_spek" class="form-control">
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

            <div class="modal efek" id="tambah1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        Kode barang<br>
                        Nama Barang<br>
                        Kategori<br>
                        Merk<br>
                        Spesifikasi<br>
                        Tgl Masuk<br>
                        Status<br>
                      </div>
                      <div class="col-md-4">
                        &nbsp;:&nbsp;<a id="kd_b"></a><br>
                        &nbsp;:&nbsp;<a id="n_b"></a><br>
                        &nbsp;:&nbsp;<a id="kat"></a><br>
                        &nbsp;:&nbsp;<a id="mer"></a><br>
                        &nbsp;:&nbsp;<a id="spe"></a><br>
                        &nbsp;:&nbsp;<a id="tgl"></a><br>
                        &nbsp;:&nbsp;<a id="sts"></a><br>
                      </div>
                      <div class="col-md-4">
                        <img id="gmbr" width="128px" height="110px;" alt="">
                        
                        
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer"></div>
                </div>
              </div>
            </div>     

          </div>
        </div>
</div>
<!-- Modal Detail -->
