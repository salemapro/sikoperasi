<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Pegawai | Koperasi</title>
    <?php $this->load->view("admin/_includes/head.php") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view("admin/_includes/header.php") ?>
        <?php $this->load->view("admin/_includes/sidebar.php") ?>

        <div class="content-wrapper">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="box-body">
                    <div class="alert alert-success alert-dismissible">
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
            <section class="content-header">
                <h1>
                    Data
                    <small>Pengajuan</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> Pengajuan</a></li>
                    <li><a href="#">Lihat Data Pengajuan</a></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <!-- <a href="<?php echo base_url('Pengajuan/add') ?>" class="btn btn-tosca"><i class="fa fa-fw fa-plus"></i>Tambah</a> -->
                                <a href="<?php echo base_url("Pengajuan/export"); ?>" class="btn btn-carot"><i class="fa fa-fw fa-download"></i>Export Data</a>
                            </div>
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>Sisa Kontrak / Bln</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Besar Pinjam</th>
                                            <th>Status</th>
                                            <th>Tanggal Acc</th>
                                            <th>Pinjaman Yang Disetujui</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if (!empty($pengajuan)): ?>
                                            <?php foreach ($pengajuan as $value) : ?>
                                                <tr>
                                                    <td><?php cetak($no++) ?></td>
                                                    <td><?php cetak($value->nama) ?></td>
                                                    <td><?php cetak($value->bagian) ?></td>
                                                    <td><?php cetak($value->sisa_kontrak) ?></td>
                                                    <td><?php cetak($value->tgl_pengajuan) ?></td>
                                                    <td><?php cetak($value->besar_pinjam) ?></td>
                                                    <td><?php cetak($value->status) ?></td>
                                                    <td><?php cetak($value->tgl_acc) ?></td>
                                                    <td><?php cetak($value->jml_pinjam_disetujui) ?></td>
                                                    <td>
                                                        <?php if ($value->status == 'waiting'): ?>
                                                            <a class="btn btn-warning" href="<?php echo site_url('pengajuan/detail/' . $value->id_pengajuan) ?>"><i class="fa fa-fw fa-eye"></i>Detail</a>
                                                            <a href="#" class="btn btn-ijo approve-btn" data-id="<?php echo $value->id_pengajuan; ?>" data-cicilan="<?php echo $value->jml_cicilan; ?>"><i class="fa fa-fw fa-check"></i>Terima</a>
                                                            <a href="#" class="btn btn-danger reject-btn" data-id="<?php echo $value->id_pengajuan; ?>"><i class="fa fa-fw fa-times"></i>Tolak</a>
                                                            <!-- <a href="<?php echo site_url('pengajuan/reject/' . $value->id_pengajuan) ?>" class="btn btn-danger"><i class="fa fa-fw fa-times"></i>Tolak</a> -->
                                                        <?php else : ?>
                                                            <a class="btn btn-warning" href="<?php echo site_url('pengajuan/detail/' . $value->id_pengajuan) ?>"><i class="fa fa-fw fa-eye"></i>Detail</a>
                                                            <a href="#!" onclick="deleteConfirm('<?php echo site_url('pengajuan/delete/' . $value->id_pengajuan) ?>')" class="btn btn-mandarin"><i class="fa fa-fw fa-trash"></i>Hapus</a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10">No data available</td>
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
        <?php $this->load->view("admin/_includes/footer.php") ?>
        <?php $this->load->view("admin/_includes/control_sidebar.php") ?>
        <div class="control-sidebar-bg"></div>
    </div>

    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Approve Submission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="approveForm" method="post">
                        <!-- <p>Are you sure you want to approve this submission?</p> -->
                        <div class="form-group">
                            <label>Jumlah Pinjaman Yang Disetujui</label>
                            <input name="jml_pinjam_disetujui" class="form-control <?php echo form_error('jml_pinjam_disetujui') ? 'is-invalid' : '' ?>" placeholder="Masukan Jumlah Pinjaman Yang Disetujui" type="text" />
                            <div class="invalid-feedback">
                                <?php echo form_error('jml_pinjam_disetujui') ?>
                            </div>
                        </div>
                        <input type="hidden" name="jml_cicilan" id="jml_cicilan">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmApprove" class="btn btn-ijo">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Submission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="rejectForm" method="post">
                        <p>Are you sure you want to reject this submission?</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmReject" class="btn btn-ijo">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.approve-btn').on('click', function() {
                var id_pengajuan = $(this).data('id');
                var jumlahCicilan = $(this).data('cicilan');
                // var jumlahCicilan = $(this).closest('tr').find('td:eq(9)').text().trim();

                console.log("Extracted jml_cicilan: " + jumlahCicilan);

                $('#approveModal').modal('show');
                $('#approveForm').attr('action', '<?php echo site_url('pengajuan/approve/'); ?>' + id_pengajuan);
                $('#jml_cicilan').val(jumlahCicilan);
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