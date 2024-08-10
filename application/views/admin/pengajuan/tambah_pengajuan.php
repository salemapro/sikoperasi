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

      <section class="content-header">
        <h1>
          Kelola
          <small>Pengajuan</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> Pengajuan</a></li>
          <li><a href="<?php echo base_url('Pengajuan/index') ?>">Lihat Data Pengajuan</a></li>
          <li><a href="<?php echo base_url('Pengajuan/add') ?>">Tambah Data Pengajuan</a></li>
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
              <form role="form" action="<?php echo base_url('pengajuan/add') ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="karyawan_id" type="hidden" value="<?= $user->id_karyawan ?>" class="form-control" />
                    <input name="sisa_kontrak" type="hidden" value="<?= $user->sisa_kontrak ?>" class="form-control" />
                    <input name="nip" value="<?= $user->nip ?>" class="form-control <?php echo form_error('nip') ? 'is-invalid' : '' ?>" readonly type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nip') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $user->nama ?>" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" readonly type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bagian</label>
                    <input name="bagian" value="<?= $user->bagian ?>" class="form-control <?php echo form_error('bagian') ? 'is-invalid' : '' ?>" readonly type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('bagian') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Pinjaman</label>
                    <input name="jml_pinjaman" class="form-control <?php echo form_error('jml_pinjaman') ? 'is-invalid' : '' ?>" placeholder="Masukan Jumlah Pinjaman" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('jml_pinjaman') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Cicilan</label>
                    <input name="jml_cicilan" class="form-control <?php echo form_error('jml_cicilan') ? 'is-invalid' : '' ?>" placeholder="Masukan Jumlah Kali Cicilan" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('jml_cicilan') ?>
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