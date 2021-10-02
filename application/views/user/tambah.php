<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data User</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('tambah-user'); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= set_value('name'); ?>" required>
                                <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                                <span class="text-danger small" id="dup_username"></span>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password2" required>
                                <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Role</label>
                                <select class="form-control" name="role" value="<?= set_value('role'); ?>" required>
                                    <option>- Pilih Role -</option>
                                    <option value="Bidang Koperasi" <?= set_value('role') == "Bidang Koperasi" ? 'selected' : '';?>>Bidang Koperasi</option>
                                    <option value="Bagian Perencanaan" <?= set_value('role') == "Bagian Perencanaan" ? 'selected' : '';?>>Bagian Perencanaan/Sekretariat</option>
                                </select>
                                <?= form_error('role', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('user'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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
<?php $this->load->view('template/footer');?>