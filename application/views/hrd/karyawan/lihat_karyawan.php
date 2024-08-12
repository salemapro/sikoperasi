<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Karyawan | Koperasi</title>

  <?php $this->load->view("hrd/_includes/head.php") ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("hrd/_includes/header.php") ?>
    <?php $this->load->view("hrd/_includes/sidebar.php") ?>


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
      <!-- Alert -->

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Karyawan Koperasi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-child"></i> Karyawan</a></li>
          <li><a href="#">Lihat Data Karyawan</a></li>
        </ol>
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <a href="<?php echo base_url('Karyawan/add') ?>" class="btn btn-tosca"><i class="fa fa-fw fa-plus"></i>Tambah</a>
                <!-- <a href="<?php echo base_url("Karyawan/export"); ?>" class="btn btn-carot"><i class="fa fa-fw fa-download"></i>Export Data</a> -->

              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Bagian</th>
                      <th>Tanggal Masuk</th>
                      <th>Sisa Kontrak / Bln</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php if (!empty($karyawan)): ?>
                      <?php foreach ($karyawan as $value) : ?>
                        <tr>
                          <td><?php cetak($no++) ?></td>
                          <td><?php cetak($value->nip)  ?></td>
                          <td><?php cetak($value->nama) ?></td>
                          <td><?php cetak($value->jenis_kelamin)  ?></td>
                          <td><?php cetak($value->alamat)  ?></td>
                          <td><?php cetak($value->bagian)  ?></td>
                          <td><?php cetak($value->tgl_masuk)  ?></td>
                          <td><?php cetak($value->sisa_kontrak)  ?></td>
                          <td>
                            <a class="btn btn-warning" href="<?php echo site_url('Karyawan/detail/' . $value->id_karyawan) ?>"><i class="fa fa-fw fa-users"></i>Detail</a>
                            <a class="btn btn-ref" href="<?php echo site_url('Karyawan/edit/' . $value->id_karyawan) ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
                            <a href="#!" onclick="deleteConfirm('<?php echo site_url('Karyawan/delete/' . $value->id_karyawan) ?>')" class="btn btn-mandarin"><i class="fa fa-fw fa-trash"></i>Hapus</a>
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

                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
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

  <!-- Logout Delete Confirmation-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  <?php $this->load->view("hrd/_includes/bottom_script_view.php") ?>
  <!-- page script -->
  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>
</body>

</html>