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
                    <small>Data Anggota Koperasi</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('Pinjaman_controller') ?>"><i class="fa fa-fw fa-money"></i> Lihat
                            Pinjaman</a></li>
                    <li><a href="#">Data Anggota</a></li>
                </ol>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <!--  -->
                            <!-- /.box-header -->
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i>

                                    <h3 class="box-title">Detail Pengajuan Pinjaman</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-md-6">
                                        <div class="callout callout-info">
                                            <?php if (!empty($pengajuan)): ?>
                                                <?php foreach ($pengajuan as $value): ?>
                                                    <h4>No Pengajuan</h4>
                                                    <p><?php cetak($value->no_pengajuan) ?></p>
                                                    <h4>NIP</h4>
                                                    <p><?php cetak($value->nip) ?></p>
                                                    <h4>Nama Karyawan</h4>
                                                    <p><?php cetak($value->nama) ?></p>
                                                    <h4>Bagian</h4>
                                                    <p><?php cetak($value->bagian) ?></p>
                                                    <h4>Sisa Kontrak</h4>
                                                    <p><?php cetak($value->sisa_kontrak) ?></p>
                                                    <h4>Tanggal Pengajuan Pinjaman</h4>
                                                    <p><?php cetak($value->tgl_pengajuan) ?></p>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="callout callout-success">
                                            <?php if (!empty($pengajuan)): ?>
                                                <?php foreach ($pengajuan as $value): ?>
                                                    <h4>Jumlah Pengajuan Pinjaman</h4>
                                                    <p><?php echo "Rp. " . (number_format($value->besar_pinjam, 2, ',', '.')) ?></p>

                                                    <h4>Lama Cicilan Pinjam</h4>
                                                    <p><?php cetak($value->jml_cicilan) ?> Bulan</p>

                                                    <h4>Jumlah Pinjaman Yang Disetujui</h4>
                                                    <?php if ($value->status == 'waiting') { ?>
                                                        <p>Menunggu Acc</p>
                                                    <?php } else if ($value->status == 'rejected') { ?>
                                                        <p> - </p>
                                                    <?php } else { ?>
                                                        <p><?php echo "Rp. " . (number_format($value->jml_pinjam_disetujui, 2, ',', '.')) ?></p>
                                                    <?php } ?>

                                                    <h4>Besar Cicilan Perbulan</h4>
                                                    <?php if ($value->status == 'waiting') { ?>
                                                        <p>Menunggu Acc</p>
                                                    <?php } else if ($value->status == 'rejected') { ?>
                                                        <p> - </p>
                                                    <?php } else { ?>
                                                        <p><?php echo "Rp. " . (number_format($value->besar_cicilan, 2, ',', '.')) ?></p>
                                                    <?php } ?>

                                                    <h4>Status</h4>
                                                    <?php if ($value->status == 'waiting') { ?>
                                                        <p>Menunggu Acc</p>
                                                    <?php } else if ($value->status == 'rejected') { ?>
                                                        <p>Pengajuan Ditolak </p>
                                                    <?php } else { ?>
                                                        <p>Pengajuan Pinjaman Disetujui</p>
                                                    <?php } ?>

                                                    <h4>Tanggal Acc</h4>
                                                    <?php if ($value->status == 'waiting') { ?>
                                                        <p>Menunggu Acc</p>
                                                    <?php } else if ($value->status == 'rejected') { ?>
                                                        <p> - </p>
                                                    <?php } else { ?>
                                                        <p><?php cetak($value->tgl_acc) ?></p>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                            <!-- <?php $beban = $value->jumlah_pinjaman / 100 * $value->bunga + $value->jumlah_pinjaman;
                                                    $angs = $value->jumlah_pinjaman / 100 * $value->bunga + $value->jumlah_pinjaman / $value->lama * $value->lama;
                                                    ?>

                                                <p><?php if ($value->total  == $beban) {
                                                        echo "Lunas";
                                                    } else {
                                                        echo  "Belum Lunas";
                                                    } ?></p> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
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
        <?php $this->load->view("karyawan/_includes/footer.php") ?>
        <?php $this->load->view("karyawan/_includes/control_sidebar.php") ?>
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
    <?php $this->load->view("karyawan/_includes/bottom_script_view.php") ?>
    <!-- page script -->
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>