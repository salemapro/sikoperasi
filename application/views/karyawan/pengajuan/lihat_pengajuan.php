<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Pegawai | Koperasi</title>
    <?php $this->load->view("karyawan/_includes/head.php") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view("karyawan/_includes/header.php") ?>
        <?php $this->load->view("karyawan/_includes/sidebar.php") ?>

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
                                <a href="<?php echo base_url('Pengajuan/add') ?>" class="btn btn-tosca"><i class="fa fa-fw fa-plus"></i>Tambah</a>
                                <!-- <a href="<?php echo base_url("Pengajuan/export"); ?>" class="btn btn-carot"><i class="fa fa-fw fa-download"></i>Export Data</a> -->
                            </div>
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pengajuan</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>Sisa Kontrak</th>
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
                                                    <td><?php cetak($value->no_pengajuan)  ?></td>
                                                    <td><?php cetak($value->nama)  ?></td>
                                                    <td><?php cetak($value->bagian) ?></td>
                                                    <td><?php cetak($value->sisa_kontrak)  ?></td>
                                                    <td><?php cetak($value->tgl_pengajuan)  ?></td>
                                                    <td><?php cetak($value->besar_pinjam)  ?></td>
                                                    <td><?php cetak($value->status)  ?></td>
                                                    <td><?php cetak($value->tgl_acc)  ?></td>
                                                    <td><?php cetak($value->jml_pinjam_disetujui)  ?></td>
                                                    <td>
                                                        <a class="btn btn-warning" href="<?php echo site_url('pengajuan/detail/' . $value->id_pengajuan) ?>"><i class="fa fa-fw fa-eye"></i>Detail</a>
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
        <?php $this->load->view("karyawan/_includes/footer.php") ?>
        <?php $this->load->view("karyawan/_includes/control_sidebar.php") ?>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php $this->load->view("karyawan/_includes/bottom_script_view.php") ?>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>