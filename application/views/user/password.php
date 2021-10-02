<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data User</a></li>
              <li class="breadcrumb-item active">Edit Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="<?= base_url('changes-password'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="label">Password Lama</label>
                            <input type="hidden" class="form-control" name="id_user" value="<?= $this->session->userdata('id_user'); ?>" readonly>
                            <input type="password" class="form-control" name="password_lama" required>
                            <?= form_error('password_lama', '<span class="text-danger small">', '</span>'); ?>
                        </div>                  
                        <div class="form-group">
                            <label class="label">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" required>
                            <?= form_error('password_baru', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="konfirmasi_password_baru" required>
                            <?= form_error('konfirmasi_password_baru', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default" href="<?= base_url('dashboard'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
              
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('template/footer'); ?>
