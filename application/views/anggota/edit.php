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
                        <li class="breadcrumb-item"><a href="#">Data Anggota</a></li>
                        <li class="breadcrumb-item active">Edit Anggota</li>
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
                            <h3 class="card-title">Form Edit Anggota</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('edit-anggota/'.$a['id_anggota']); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">No Anggota</label>
                                <input type="text" class="form-control" name="no_anggota" value="<?= set_value('no_anggota', $a['no_anggota']); ?>" required>
                                <?= form_error('no_anggota', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">NIK</label>
                                <input type="text" class="form-control" name="nik" value="<?= set_value('nik', $a['nik']); ?>" required>
                                <?= form_error('nik', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Anggota</label>
                                <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $a['nama']); ?>" required>
                                <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option disabled="" selected="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki" <?= set_value('jenis_kelamin', $a['jenis_kelamin']) == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= set_value('jenis_kelamin', $a['jenis_kelamin']) == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                                <?= form_error('tanggal_mulai', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="text" class="form-control" name="no_telp" value="<?= set_value('no_telp', $a['no_telp']); ?>" required>
                                <?= form_error('no_telp', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat', $a['alamat']); ?>" required>
                                <?= form_error('alamat', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tanggal_masuk" value="<?= set_value('tanggal_masuk', $a['tanggal_masuk']); ?>" required>
                                <?= form_error('tanggal_masuk', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Simpanan Pokok</label>
                                <input type="number" class="form-control" name="simpanan_pokok" value="<?= set_value('simpanan_pokok', $a['simpanan_pokok']); ?>" required>
                                <?= form_error('simpanan_pokok', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Simpanan Wajib</label>
                                <input type="number" class="form-control" name="simpanan_wajib" value="<?= set_value('simpanan_wajib', $a['simpanan_wajib']); ?>" required>
                                <?= form_error('simpanan_wajib', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('anggota'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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