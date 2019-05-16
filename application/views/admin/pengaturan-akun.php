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
                    <h3 class="card-title">Daftar Akun</h3>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
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
                  <th>Bidang</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php //var_dump($table); ?>
                  <?php
                    foreach($table as $row){ ?>
                    <?php if($row->nip==$this->session->userdata('session')['nip']){
                        continue;
                    } ?>
                    <tr>
                        <td><?= $row->nip ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->bidang ?></td>
                        <td><?php
                         if($row->level==1){
                             echo 'Petugas';
                         }else{
                             echo 'Admin';
                         }
                         ?></td>
                        <td><?php
                         if($row->status==1){
                            echo '<span class="badge badge-success">Aktif</span>';
                         }else{
                            echo '<span class="badge badge-secondary">Belum aktif</span>';
                         }
                         ?></td>
                        <td>
                          <button class="btn btn-warning btn-sm">Ubah Pass</button>
                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Bidang</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
            