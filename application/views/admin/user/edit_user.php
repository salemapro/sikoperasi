<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Data user | Koperasi</title>
  <?php $this->load->view("admin/_includes/head.php") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("admin/_includes/header.php") ?>
    <?php $this->load->view("admin/_includes/sidebar.php") ?>

    <div class="content-wrapper">
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
          <a href="<?php echo base_url('user/index') ?>">Ok</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
      <?php endif; ?>

      <section class="content-header">
        <h1>
          Kelola
          <small>Data user</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-child"></i> User</a></li>
          <li><a href="<?php echo base_url('user/index') ?>">Lihat Data User</a></li>
          <li><a href="#">Edit Data User</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Pengisian Form</h3>
              </div>
              <form role="form" action="<?php echo base_url('user/edit/' . $user->id_user) ?>" method="post">
                <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>" />
                <div class="box-body">
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" readonly class="form-control <?php echo form_error('nip') ? 'is-invalid' : '' ?>" placeholder="Masukan NIP" value="<?php echo $user->nip ?>" type="text" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nip') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Masukan Nama" value="<?php echo $user->nama ?>" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input name="username" readonly class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" placeholder="Masukan username" value="<?php echo $user->username ?>" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('username') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" placeholder="Masukan password" value="<?php echo $user->password ?>" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('password') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Role</label>
                    <div class="radio">
                      <label>
                        <input type="radio" <?php echo $user->role == 'admin' ? 'checked' : '' ?> class="<?php echo form_error('role') ? 'is-invalid' : '' ?>" name="role" value="admin">
                        Admin
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" <?php echo $user->role == 'karyawan' ? 'checked' : '' ?> class="<?php echo form_error('role') ? 'is-invalid' : '' ?>" name="role" value="karyawan">
                        Karyawan
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" <?php echo $user->role == 'manajer' ? 'checked' : '' ?> class="<?php echo form_error('role') ? 'is-invalid' : '' ?>" name="role" value="manajer">
                        Manajer
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" <?php echo $user->role == 'hrd' ? 'checked' : '' ?> class="<?php echo form_error('role') ? 'is-invalid' : '' ?>" name="role" value="hrd">
                        HRD
                      </label>
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

    <?php $this->load->view("admin/_includes/footer.php") ?>
    <?php $this->load->view("admin/_includes/control_sidebar.php") ?>

    <div class="control-sidebar-bg"></div>
  </div>
  <?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
</body>

</html>