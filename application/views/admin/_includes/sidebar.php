<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/logoadmin.jpg') ?> " class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin Koperasi</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigation</li>

      <li><a href="<?php echo base_url('Dashboard_controller/admin') ?>"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-dollar"></i> <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Karyawan') ?>"><i class="fa fa-fw fa-child"></i> <span>Kelola Data Karyawan</span></a></li>
          <li><a href="<?php echo base_url('User') ?>"><i class="fa fa-fw fa-child"></i> <span>Kelola Data User</span></a></li>
        </ul>
      </li>

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-dollar"></i> <span>Simpanan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('SimpananPokok_controller') ?>"><i class="fa fa-circle-o"></i>Simpanan Pokok</a></li>
          <li><a href="<?php echo base_url('SimpananWajib_controller') ?>"><i class="fa fa-circle-o"></i>Simpanan Wajib</a></li>
          <li><a href="<?php echo base_url('SimpananSukarela_controller') ?>"><i class="fa fa-circle-o"></i>Simpanan Sukarela</a></li>
        </ul>
      </li> -->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-dollar"></i> <span>Master Pinjaman</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Pengajuan') ?>"><i class="fa fa-fw fa-money"></i> <span>Data Pengajuan</span></a></li>
          <li><a href="<?php echo base_url('Pinjaman') ?>"><i class="fa fa-fw fa-user-plus"></i> <span>Data Pinjaman</span></a></li>
          <li><a href="<?php echo base_url('Pembayaran') ?>"><i class="fa fa-fw fa-user-plus"></i> <span>Data Pembayaran</span></a></li>
          <li><a href="<?php echo base_url('Pelunasan') ?>"><i class="fa fa-fw fa-user-plus"></i> <span>Pelunasan</span></a></li>
        </ul>
      </li>

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-dollar"></i> <span>Angsuran</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Angsuran_controller') ?>"><i class="fa fa-circle-o"></i>Kelola Angsuran</a></li>
          <li><a href="<?php echo base_url('Angsuran_controller/list_anggota') ?>"><i class="fa fa-circle-o"></i>Detail Angsuran</a></li>
        </ul>
      </li> -->

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-dollar"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Angsuran_controller') ?>"><i class="fa fa-circle-o"></i>Laporan Pinjaman</a></li>
          <li><a href="<?php echo base_url('Angsuran_controller/list_anggota') ?>"><i class="fa fa-circle-o"></i>Laporan Pembayaran</a></li>
        </ul>
      </li> -->
      <li><a href="<?php echo base_url('Auth/logout') ?>"><i class="fa fa-circle-o"></i>Sign out</a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>