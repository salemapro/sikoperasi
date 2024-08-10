<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Data Karyawan | Koperasi</title>
  <?php $this->load->view("hrd/_includes/head.php") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("hrd/_includes/header.php") ?>
    <?php $this->load->view("hrd/_includes/sidebar.php") ?>

    <div class="content-wrapper">
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
          <a href="<?php echo base_url('Karyawan/index') ?>">Ok</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
      <?php endif; ?>

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Karyawan</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-child"></i> Karyawan</a></li>
          <li><a href="<?php echo base_url('Karyawan/index') ?>">Lihat Data Karyawan</a></li>
          <li><a href="#">Edit Data Karyawan</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Pengisian Form</h3>
              </div>
              <form role="form" action="<?php echo base_url('Karyawan/edit/' . $karyawan->id_karyawan) ?>" method="post">
                <input type="hidden" name="id_karyawan" value="<?php echo $karyawan->id_karyawan ?>" />
                <div class="box-body">
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid' : '' ?>" placeholder="Masukan NIP" value="<?php echo $karyawan->nip ?>" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nip') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Masukan Nama" value="<?php echo $karyawan->nama ?>" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio">
                      <label>
                        <input type="radio" <?php echo $karyawan->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' ?> class="<?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin" value="Laki-Laki">
                        Laki-Laki
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" <?php echo $karyawan->jenis_kelamin == 'Perempuan' ? 'checked' : '' ?> class="<?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin" value="Perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" placeholder="Masukan Alamat" value="<?php echo $karyawan->alamat ?>" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('alamat') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Bagian</label>
                    <input name="bagian" class="form-control <?php echo form_error('bagian') ? 'is-invalid' : '' ?>" placeholder="Masukan Bagian" value="<?php echo $karyawan->bagian ?>" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('bagian') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input name="tgl_masuk" class="form-control <?php echo form_error('tgl_masuk') ? 'is-invalid' : '' ?>" placeholder="Tanggal Masuk" value="<?php echo $karyawan->tgl_masuk ?>" type="date">
                    <div class="invalid-feedback">
                      <?php echo form_error('tgl_masuk') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Sisa Kontrak</label>
                    <input name="sisa_kontrak" class="form-control <?php echo form_error('sisa_kontrak') ? 'is-invalid' : '' ?>" placeholder="Sisa Kontrak" value="<?php echo $karyawan->sisa_kontrak ?>" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('sisa_kontrak') ?>
                    </div>
                  </div>

                </div>

                <div class="box-footer">
                  <button class="btn btn-success" name="submit" type="submit"><i class="fa fa-fw fa-plus"></i>Simpan</button>
                  <button class="btn btn-danger" type="reset"><i style="margin-left: -3px;" class="fa fa-fw fa-times"></i>Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php $this->load->view("hrd/_includes/footer.php") ?>
    <?php $this->load->view("hrd/_includes/control_sidebar.php") ?>

    <div class="control-sidebar-bg"></div>
  </div>
  <?php $this->load->view("hrd/_includes/bottom_script_view.php") ?>
</body>

</html>