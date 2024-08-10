<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<?php $this->load->view("admin/_includes/head.php") ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("admin/_includes/header.php") ?>
    <?php $this->load->view("admin/_includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Alert -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?><br>
            <!-- <a href="<?php echo base_url('Anggota_controller/detail/' . $pasangan->id_anggota) ?>">Saya Mengerti</a> -->
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Pembayaran</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url('Pembayaran/index') ?>"><i class="fa fa-fw fa-child"></i>Lihat Data Pembayaran</a></li>
          <li><a href="#">Tambah Pembayaran</a></li>
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
                <h3 class="box-title">Pengisian Form Pembayaran</h3>
              </div>
              <!-- /.box-header -->

              <!-- form start -->
              <form role="form" action="<?php echo base_url('pembayaran/add_pembayaran/') ?>" method="post">
                <input type="hidden" name="id_anggota" value="" />

                <div class="box-body">
                  <div class="form-group">
                    <label>No Pembayaran</label>
                    <input name="no_pembayaran" value="<?php echo $no_pembayaran ?>" class="form-control <?php echo form_error('no_pembayaran') ? 'is-invalid' : '' ?>" readonly type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('no_pembayaran') ?>
                    </div>
                  </div>
                  <?php if (!empty($pembayaran)) { ?>
                    <div class="form-group">
                      <label>No Pinjaman</label>
                      <input name="id_pinjaman" value="<?php echo $pembayaran[0]->id_pinjaman; ?>" class="form-control <?php echo form_error('id_pinjaman') ? 'is-invalid' : '' ?>" readonly type="hidden" />
                      <input name="jml_cicilan" value="<?php echo $pembayaran[0]->jml_cicilan_pinjam; ?>" class="form-control <?php echo form_error('jml_cicilan') ? 'is-invalid' : '' ?>" readonly type="hidden" />
                      <input name="no_pinjaman" value="<?php echo $pembayaran[0]->no_pinjaman; ?>" class="form-control <?php echo form_error('no_pinjaman') ? 'is-invalid' : '' ?>" readonly type="text" />
                      <div class="invalid-feedback">
                        <?php echo form_error('no_pinjaman') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>NIP</label>
                      <input name="nip" value="<?php echo $pembayaran[0]->nip_peminjam; ?>" class="form-control <?php echo form_error('nip') ? 'is-invalid' : '' ?>" readonly type="text" />
                      <div class="invalid-feedback">
                        <?php echo form_error('nip') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input name="nama" value="<?php echo $pembayaran[0]->nama_peminjam; ?>" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" readonly type="text" />
                      <div class="invalid-feedback">
                        <?php echo form_error('nama') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Cicilan Ke</label>
                      <?php
                      $latest_payment = $pembayaran[0];
                      $cicilan_ke = $latest_payment->cicilan_ke;
                      $jml_cicilan = $latest_payment->jml_cicilan_pinjam;

                      if ($cicilan_ke == null || $cicilan_ke == 0) {
                        $display_value = 1;
                      } else {
                        $display_value = $cicilan_ke + 1;
                        if ($display_value > $jml_cicilan) {
                          $display_value = $jml_cicilan;
                        }
                      }
                      ?>
                      <input name="cicilan_ke" value="<?= $display_value ?>" class="form-control <?php echo form_error('cicilan_ke') ? 'is-invalid' : '' ?>" readonly type="text" />
                      <div class="invalid-feedback">
                        <?php echo form_error('cicilan_ke') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Bayar</label>
                      <input name="jml_bayar" value="<?php echo (number_format($pembayaran[0]->besar_cicilan_pinjam)); ?>" class="form-control <?php echo form_error('jml_bayar') ? 'is-invalid' : '' ?>" readonly type="text" />
                      <div class="invalid-feedback">
                        <?php echo form_error('jml_bayar') ?>
                      </div>
                    </div>
                  <?php } ?>
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