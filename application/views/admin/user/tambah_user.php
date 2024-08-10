<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Data User | Koperasi</title>
  <?php $this->load->view("admin/_includes/head.php") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("admin/_includes/header.php") ?>
    <?php $this->load->view("admin/_includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Alert -->
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')) : ?>
        <div class="box-body">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->

      <section class="content-header">
        <h1>
          Kelola
          <small>Data User</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> User</a></li>
          <li><a href="<?php echo base_url('User/index') ?>">Lihat Data User</a></li>
          <li><a href="<?php echo base_url('User/add') ?>">Tambah Data User</a></li>
        </ol>
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Pengisian Form</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('User/add') ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid' : '' ?>" placeholder="Masukan NIP" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nip') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Masukan Nama" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" placeholder="Masukan Username" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('username') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" placeholder="Masukan Password" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('password') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="role" class="form-control <?php echo form_error('role') ? 'is-invalid' : '' ?>">
                      <option value="admin"> Admin </option>
                      <option value="karyawan"> Karyawan </option>
                      <option value="manajer"> Manajer Keuangan </option>
                      <option value="hrd"> HRD </option>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo form_error('role') ?>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-plus"></i>Simpan</button>
                  <button class="btn btn-danger" type="reset"><i style="margin-left: -3px;" class="fa fa-fw fa-times"></i>Batal</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view("admin/_includes/footer.php") ?>
    <?php $this->load->view("admin/_includes/control_sidebar.php") ?>

    <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
  <!-- page script -->
</body>

</html>