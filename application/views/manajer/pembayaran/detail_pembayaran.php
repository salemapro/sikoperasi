<!DOCTYPE html>
<html>
<?php $this->load->view("manajer/_includes/head.php") ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("manajer/_includes/header.php") ?>
    <?php $this->load->view("manajer/_includes/sidebar.php") ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Alert -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Pembayaran Karyawan</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url('Pinjaman_controller') ?>"><i class="fa fa-fw fa-money"></i> Lihat
              Pembayaran</a></li>
          <li><a href="#">Data Pembayaran</a></li>
        </ol>
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <!-- <button class="btn btn-carot"><i class="fa fa-fw fa-download"></i>Export Data</button> -->
                <a href="<?= base_url('Laporan/print_data_pembayaran/' . $id) ?>" class="btn btn-info btn-md">
                  <i class="fa fa-print"></i> Print Data
                </a>
              </div>

              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>No Pinjaman</th>
                      <th>No Pembayaran</th>
                      <th>Cicilan Ke</th>
                      <th>Jumlah Bayar</th>
                      <th>Status</th>
                      <th>Tanggal Bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php if (!empty($pembayaran)): ?>
                      <?php foreach ($pembayaran as $value): ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $value->nama_peminjam; ?></td>
                          <td><?php echo $value->no_pinjaman; ?></td>
                          <td><?php echo ($value->status_bayar == 1) ? $value->no_pembayaran : '-'; ?></td>
                          <td><?php echo $value->cicilan_ke; ?></td>
                          <td><?php echo $value->jml_bayar; ?></td>
                          <td><?php echo ($value->status_bayar == 1) ? 'Sudah Bayar' : 'Belum Bayar'; ?></td>
                          <td><?php echo ($value->status_bayar == 1) ? $value->tgl_bayar : '-'; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="8">No data available</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>

    <?php $this->load->view("manajer/_includes/footer.php") ?>
    <?php $this->load->view("manajer/_includes/control_sidebar.php") ?>
    <!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>

  <!-- Logout Delete Confirmation-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view("manajer/_includes/bottom_script_view.php") ?>
  <!-- page script -->
  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>
</body>

</html>