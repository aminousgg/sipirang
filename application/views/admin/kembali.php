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
<a href="<?= base_url() ?>export/cetak/kmbl" target="_blank" class="btn btn-info btn-sm mb-1">
  <i class="fa fa-print"></i> Cetak kembali
</a>
<div class="row mt-1">
    <div class="col-md-10">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form cari</h3>
            </div>
            <div class="card-body">
            <?= form_open_multipart('') ?>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <?php
                      $this->db->select('kd_pjm');
                      $angg=$this->db->get_where('record',array('status'=>0))->result();
                    ?>
                     <label>Kode Pinjam</label>
                     <input type="text" placeholder="Masukan Kode Pinjam" autofocus id="kode_pjm" list="browsers" class="form-control" autocomplete="off" required>
                     <datalist id="browsers">
                      <?php foreach($angg as $u){?>
                        <option value="<?php echo $u->kd_pjm ?>">
                      <?php }?>
                     </datalist>
                  </div>
                  <div class="col">
                    <label>Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama" autocomplete="off" disabled>
                    <input type="hidden" nama="nama1" id="nama1">
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
                <div class="row">
                  <div class="col tombol-kmbl">
                  </div>
                </div>
              </div>
            <?= form_close() ?>
            </div>
            
        </div>
    </div>
</div>
<!--  -->
<div class="row mt-0">
  <div class="col-md-12">
    <div class="card" id="data-res">
      <div class="card-header">
          <h3 class="card-title">Data result</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
            <th style="width:10px;">No</th>
            <th>Nama Peminjam</th>
            <th>Barang</th>
            <th>Merk</th>
            <th>Kategori</th>
            <th>Tgl Pinjam</th>
            <th>Aksi</th>
          </tr>
          <tbody id="isi-res">

          <tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>
<!-- modal -->
