<nav class="main-header navbar navbar-expand navbar-green navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <!-- User Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <?= $this->session->userdata('nama'); ?>
        <i class="far fa-user"></i>
        
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('setting') ?>" class="dropdown-item">
          <i class="fas fa-cog mr-2"></i> Ubah Profil
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('changes-password') ?>" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i> Ubah Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('logout'); ?>" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Keluar
        </a>
      </div>
    </li>
  </ul>
</nav>  
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('dashboard');?>" class="brand-link">
    <img src="<?= base_url();?>assets/img/lososbg.png" alt="Logo Subang" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">SIPDARAT - PKB</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img class="img-circle elevation-2" alt="User Image" src="<?= base_url().'assets/img/user.png' ?>" />
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('nama')?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if (is_admin()):?>
        <li class="nav-item">
          <a href="<?= base_url('user'); ?>" class="nav-link <?= $title == 'Data User' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Data User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('koperasi'); ?>" class="nav-link <?= $title == 'Data Umum Koperasi' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Data Umum Koperasi</p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= $title == 'Data Penilaian' || $title == 'Data RAT' || $title == 'Penilaian Kesehatan' ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= $title == 'Data Penilaian' || $title == 'Data RAT' || $title == 'Penilaian Kesehatan' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Penilaian
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('penilaian'); ?>" class="nav-link <?= $title == 'Data Penilaian' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penilaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('rat'); ?>" class="nav-link <?= $title == 'Data RAT' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data RAT</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('penilaian-kesehatan'); ?>" class="nav-link <?= $title == 'Penilaian Kesehatan' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penilaian Koperasi Berprestasi</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview <?= $title == 'Laporan Penilaian' || $title == 'Laporan RAT' ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= $title == 'Laporan Penilaian' || $title == 'Laporan RAT' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-flag"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('laporan-rat'); ?>" class="nav-link <?= $title == 'Laporan RAT' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Koperasi RAT</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('laporan-penilaian'); ?>" class="nav-link <?= $title == 'Laporan Penilaian' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Penilaian</p>
              </a>
            </li>
          </ul>
        </li>
        
        <?php elseif (is_koperasi()):?>
        <li class="nav-item">
          <a href="<?= base_url('anggota'); ?>" class="nav-link <?= $title == 'Data Anggota' ? 'active' : ''; ?>">
            <i class="far fa-user nav-icon"></i>
            <p>Data Anggota & Simpanan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('rat'); ?>" class="nav-link <?= $title == 'Data RAT' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>Data RAT</p>
          </a>
        </li>

        <?php elseif (is_perencanaan()):?>
        <li class="nav-item has-treeview <?= $title == 'Laporan Penilaian' || $title == 'Laporan RAT' ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= $title == 'Laporan Penilaian' || $title == 'Laporan RAT' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-flag"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('laporan-rat'); ?>" class="nav-link <?= $title == 'Laporan RAT' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Koperasi RAT</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('laporan-penilaian'); ?>" class="nav-link <?= $title == 'Laporan Penilaian' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Penilaian</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif;?>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
