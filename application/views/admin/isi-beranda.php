        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 w3-animate-zoom">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang</span>
                <span class="info-box-number">
                  <?= $num['brg'] ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3 w3-animate-zoom">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Anggota</span>
                <?= $num['agt'] ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3 w3-animate-zoom">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa fa-exchange"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Peminjam</span>
                <?= $num['pjm'] ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3 w3-animate-zoom">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-repeat"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kembali</span>
                <?= $num['kmbl'] ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>