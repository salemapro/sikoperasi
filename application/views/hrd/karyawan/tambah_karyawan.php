<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Data Karyawan | Koperasi</title>
  <?php $this->load->view("hrd/_includes/head.php") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("hrd/_includes/header.php") ?>
    <?php $this->load->view("hrd/_includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Karyawan</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> Karyawan</a></li>
          <li><a href="<?php echo base_url('Karyawan/index') ?>">Lihat Data Karyawan</a></li>
          <li><a href="<?php echo base_url('Karyawan/add') ?>">Tambah Data Karyawan</a></li>
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
              <form role="form" action="<?php echo base_url('Karyawan/add') ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid' : '' ?>" placeholder="Masukan NIP" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nip') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Masukan Nama" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio">
                      <label>
                        <input type="radio" class="<?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin" value="Laki-Laki" checked="">
                        Laki-Laki
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" class="<?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin" value="Perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" placeholder="Masukan Alamat" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('alamat') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Bagian</label>
                    <input name="bagian" class="form-control <?php echo form_error('bagian') ? 'is-invalid' : '' ?>" placeholder="Masukan Bagian" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('bagian') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input name="tgl_masuk" class="form-control <?php echo form_error('tgl_masuk') ? 'is-invalid' : '' ?>" placeholder="Tanggal Masuk" type="date">
                    <div class="invalid-feedback">
                      <?php echo form_error('tgl_masuk') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Sisa Kontrak / Bln</label>
                    <input name="sisa_kontrak" class="form-control <?php echo form_error('sisa_kontrak') ? 'is-invalid' : '' ?>" placeholder="Sisa Kontrak" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('sisa_kontrak') ?>
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

    <?php $this->load->view("hrd/_includes/footer.php") ?>
    <?php $this->load->view("hrd/_includes/control_sidebar.php") ?>

    <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view("hrd/_includes/bottom_script_view.php") ?>
  <!-- page script -->
</body>

</html>