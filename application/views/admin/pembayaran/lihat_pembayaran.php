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
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
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
          <small>Data Pembayaran</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-child"></i> Pembayaran</a></li>
          <li><a href="#">Lihat Data Pembayaran</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <!-- <button class="btn btn-carot" id="print-data"><i class="fa fa-fw fa-print"></i> Print Data</button> -->
              </div>
              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Pinjaman</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php if (!empty($pinjaman)): ?>
                      <?php foreach ($pinjaman as $value): ?>
                        <tr>
                          <td><?php cetak($no++) ?></td>
                          <td><?php cetak($value->no_pinjaman)  ?></td>
                          <td><?php cetak($value->nama_peminjam) ?></td>
                          <td><?php cetak($value->catatan_peminjaman)  ?></td>
                          <td>
                            <?php if ($value->catatan_peminjaman == 'Belum Lunas') { ?>
                              <a class="btn btn-primary" href="<?php echo site_url('Pembayaran/add/' . $value->id_pinjaman) ?>"><i class="fa fa-fw fa-plus"></i>Pembayaran</a>
                              <a class="btn btn-success" href="<?php echo site_url('Pembayaran/detail/' . $value->id_pinjaman) ?>"><i class="fa fa-fw fa-eye"></i>Detail Pembayaran</a>
                            <?php } else if ($value->catatan_peminjaman == 'Lunas') { ?>
                              <a class="btn btn-success" href="<?php echo site_url('Pembayaran/detail/' . $value->id_pinjaman) ?>"><i class="fa fa-fw fa-eye"></i>Detail Pembayaran</a>
                            <?php } else { ?>
                              <a href="#" class="btn btn-primary approve-btn" data-id="<?php echo $value->id_pinjaman; ?>"><i class="fa fa-fw fa-check"></i>Terima Pelunasan</a>
                              <a href="#" class="btn btn-danger reject-btn" data-id="<?php echo $value->id_pinjaman; ?>"><i class="fa fa-fw fa-times"></i>Tolak Pelunasan</a>
                              <a class="btn btn-success" href="<?php echo site_url('Pembayaran/detail/' . $value->id_pinjaman) ?>"><i class="fa fa-fw fa-eye"></i>Detail Pembayaran</a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="10">No data available</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>No Pinjaman</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php $this->load->view("admin/_includes/footer.php") ?>
    <?php $this->load->view("admin/_includes/control_sidebar.php") ?>
    <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>

  <!-- Approve Modal -->
  <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="approveModalLabel">Approve Pelunasan ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="approveForm" method="post">
            <!-- <div class="form-group">
              <label>No Pembayaran</label>
            </div> -->
            <div class="form-group">
              <label>No Pinjaman</label>
              <input name="no_pinjaman" id="noPinjaman" class="form-control" type="text" readonly />
            </div>
            <div class="form-group">
              <label>Besar Pinjaman</label>
              <input name="besar_pinjaman" id="besarPinjaman" class="form-control" type="text" readonly />
            </div>
            <div class="form-group">
              <label>Sisa Cicilan</label>
              <input name="sisa_cicilan" id="sisaCicilan" class="form-control" type="text" readonly />
            </div>
            <!-- <div class="form-group">
              <label>Cicilan Ke</label>
            </div> -->
            <div class="form-group">
              <label>Sisa Pembayaran</label>
              <input name="sisa_pembayaran" id="sisaPembayaran" class="form-control" type="text" readonly />
            </div>
            <input name="no_pembayaran" id="noPembayaran" class="form-control" type="hidden" readonly />
            <input name="jml_cicilan" id="jmlCicilan" class="form-control" type="hidden" readonly />
            <input name="cicilan_ke" id="cicilanKe" class="form-control" type="hidden" readonly />
            <input type="hidden" name="id_pinjaman" id="id_pinjaman">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" id="confirmApprove" class="btn btn-ijo">Approve</button>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
  <!-- page script -->
  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>
  <script>
    $(document).ready(function() {
      $('.approve-btn').on('click', function() {
        var id_pinjaman = $(this).data('id');

        $.ajax({
          url: '<?php echo site_url('pelunasan/get_data_pelunasan/'); ?>' + id_pinjaman,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            var cicilan_ke = Number(data.cicilan_ke);
            var jml_cicilan = Number(data.jml_cicilan_pinjam);
            var sisa_cicilan = Number(data.sisa_cicilan);

            var display_value;

            if (cicilan_ke == null || cicilan_ke == 0) {
              display_value = 1;
            } else {
              display_value = cicilan_ke + 1;
              if (display_value > jml_cicilan) {
                display_value = jml_cicilan;
              }
            }

            if (sisa_cicilan == null || sisa_cicilan == 0) {
              sisa_value = jml_cicilan;
            } else {
              sisa_value = sisa_cicilan;
            }

            $('#jmlCicilan').val(jml_cicilan);
            $('#cicilanKe').val(display_value);

            var sisa_pembayaran = sisa_value * data.besar_cicilan_pinjam;
            $('#id_pinjaman').val(id_pinjaman);
            $('#noPinjaman').val(data.no_pinjaman);
            $('#noPembayaran').val(data.no_pembayaran);

            // Format the number with thousands separators
            var formattedBesarPinjaman = Number(data.jml_pinjaman).toLocaleString('en-US');
            $('#besarPinjaman').val(formattedBesarPinjaman);

            $('#sisaCicilan').val(sisa_value);
            $('#sisaPembayaran').val(sisa_pembayaran.toLocaleString('en-US'));
            $('#approveModal').modal('show');

          }
        });

        $('#approveForm').attr('action', '<?php echo site_url('pelunasan/approve_pelunasan/'); ?>');

      });

      $('.reject-btn').on('click', function() {
        var id_pengajuan = $(this).data('id');
        $('#rejectModal').modal('show');
        $('#rejectForm').attr('action', '<?php echo site_url('pengajuan/rejected/'); ?>' + id_pengajuan);
      });

      $('#confirmApprove').on('click', function() {
        $('#approveForm').submit();
      });

      $('#confirmReject').on('click', function() {
        $('#rejectForm').submit();
      });
    });
  </script>

</body>

</html>