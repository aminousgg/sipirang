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
                  text: "'.'Cetak Bukti Peminjaman'.'",
                  customClass: "'.'animated bounceIn'.'",
                  }).then((result) => {
                    if (result.value) {
                      window.open("'.base_url().'export/bukti_cetak/'.$this->session->flashdata('success').'");
                    }
                  })
            </script>';
  endif;
?>
<div class="row">
    <div class="col-md-12">
      <!-- <a href="<?= base_url() ?>export/pdf/record" class="btn btn-danger btn-sm mb-1">
        <i class="fa fa-file-text-o"></i> Pdf
      </a>
      <a href="<?= base_url() ?>export/exel/record" class="btn btn-success btn-sm mb-1">
        <i class="fa fa-file-text-o"></i> Exel
      </a>-->
      <a href="<?= base_url() ?>export/cetak/pjm" target="_blank" class="btn btn-info btn-sm mb-1">
        <i class="fa fa-print"></i> Cetak pinjam
      </a>
      <!--  -->
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-3">
                    <h3 class="card-title">Daftar Peminjam</h3>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                  
                </div>
              </div>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Pinjam</th>
                  <th>Nama</th>
                  <th>Barang</th>
                  <th>Tgl Pinjam</th>
                  <th>Estimasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($table as $row){ ?>
                    <tr>
                      <td><?= $row->kd_pjm ?></td>
                      <td><?php
                        $nama=$this->db->get_where('anggota',array('nip'=>$row->nip))->row_array()['nama'];
                        echo $nama;
                      ?></td>
                      <td><?php
                        echo $this->db->get_where('barang',array('kd_brg'=>$row->kd_brg))->row_array()['nm_brg'];
                      ?></td>
                      <td><?= $row->tgl_pjm ?></td>
                      <td><?= $row->estimasi ?></td>
                      <td>
                        <a href="<?= base_url() ?>export/bukti_cetak/<?= $row->kd_pjm ?>" target="_blank" class="btn btn-info btn-sm mb-1">
                            <i class="fa fa-print"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Pinjam</th>
                  <th>Nama</th>
                  <th>Barang</th>
                  <th>Tgl Pinjam</th>
                  <th>Estimasi</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- modal tambah -->
            
            <!-- /.modal tambah -->
            <!-- modal edit -->
          </div>
        </div>
</div>
            