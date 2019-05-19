<?php
  $nama=$this->session->userdata('session')['nama'];
  $gmbr=$this->session->userdata('session')['foto'];
  $level=$this->session->userdata('session')['level'];
?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url() ?>admin-asset/foto/jateng-icon.png" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $level ?> Sipirang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $gmbr ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $nama ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url() ?>admin" id="beranda" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin/barang" id="barang" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <?php if($level=='admin'){ ?>
            <li id="bungkus-agt" class="nav-item has-treeview">
              <a href="#" id="anggota" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Anggota
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="ml-2 nav nav-treeview">
                <li class="nav-item">
                  <a id="semua-agt" href="<?= base_url() ?>admin/anggota" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Semua Anggota</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a id="peng-akn" href="<?= base_url() ?>admin/daftar_akun" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Akun Terdaftar</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php }elseif($level=='petugas'){ ?>
            <li id="bungkus-agt" class="nav-item">
              <a href="<?= base_url() ?>admin/anggota" id="anggota" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Anggota
                </p>
              </a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin/pinjam" id="pinjam" class="nav-link">
              <i class="nav-icon fa fa-exchange"></i>
              <p>
                Pinjam
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin/kembali" id="kembali" class="nav-link">
              <i class="nav-icon fa fa-repeat"></i>
              <p>
                Pengembalian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin/record" id="record" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Record
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Charts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>