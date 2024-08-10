<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<?php $this->load->view("karyawan/_includes/head.php") ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("karyawan/_includes/header.php") ?>
    <?php $this->load->view("karyawan/_includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
          <a href="<?php echo base_url('Pengajuan_controller/index') ?>">Ok</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
      <?php endif; ?>

      <section class="content-header">
        <h1>
          Kelola
          <small>Pengajuan</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i>Pengajuan</a></li>
          <li><a href="<?php echo base_url('Pengajuan_controller/index') ?>">Lihat Data Pegawai</a></li>
          <li><a href="<?php echo base_url('Pengajuan_controller/add') ?>">Tambah Data Pegawai</a></li>
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
              <form role="form" action="<?php echo base_url('Pengajuan_controller/edit/' . $pengajuan->kode_pengajuan) ?>" method="post">
                <input type="hidden" name="kode_pengajuan" value="<?php echo $pengajuan->kode_pengajuan ?>" />
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_lengkap" class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid' : '' ?>" placeholder="Masukan NIK" value="<?php echo $pengajuan->nama_lengkap ?>" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nama_lengkap') ?>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button class="btn btn-success" name="submit" type="submit"><i class="fa fa-fw fa-plus"></i>Simpan</button>
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

    <?php $this->load->view("karyawan/_includes/footer.php") ?>
    <?php $this->load->view("karyawan/_includes/control_sidebar.php") ?>

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view("karyawan/_includes/bottom_script_view.php") ?>
  <!-- page script -->
</body>

</html>