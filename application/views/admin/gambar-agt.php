<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Ubah foto Barang</h3>
            </div>
            <div class="card-body">
            <?= form_open_multipart('admin/edit_gmbr1/'.$table['id'].'/in') ?>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="text" value="<?= $table['nip'] ?>" class="form-control" id="kode" disabled>
                  </div>
                  <div class="col">
                    <input type="text" value="<?= $table['nama'] ?>" class="form-control" id="nama" disabled>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Upload Foto</label>
              </div>
              <input type="file" name="file" id="file" required>
              <div class="kotakUp" id="gambar1">
                <img width="150px" class="mt-1" height="140px" src="<?= base_url() ?>admin-asset/foto/agt/<?= $table['gambar'] ?>" alt="404">
              </div>
              <button type="submit" class="btn btn-primary mt-1">Ubah</button>
            <?= form_close() ?>
            </div>
        </div>
    </div>
</div>