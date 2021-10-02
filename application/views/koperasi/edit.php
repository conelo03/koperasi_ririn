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
                        <li class="breadcrumb-item"><a href="#">Data Umum Koperasi</a></li>
                        <li class="breadcrumb-item active">Edit Data Umum Koperasi Koperasi</li>
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
                            <h3 class="card-title">Form Edit Data Umum Koperasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('edit-koperasi/'.$k['id_koperasi']); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Koperasi</label>
                                <input type="text" class="form-control" name="nama_koperasi" value="<?= set_value('nama_koperasi', $k['nama_koperasi']); ?>" required>
                                <?= form_error('nama_koperasi', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Nomor Badan Hukum</label>
                                <input type="text" class="form-control" name="nomor_badan_hukum" required value="<?= set_value('nomor_badan_hukum', $k['nomor_badan_hukum']); ?>">
                                <?= form_error('nomor_badan_hukum', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal Badan Hukum</label>
                                <input type="date" class="form-control" name="tanggal_badan_hukum" required value="<?= set_value('tanggal_badan_hukum', $k['tanggal_badan_hukum']); ?>">
                                <?= form_error('tanggal_badan_hukum', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Jenis Koperasi</label>
                                <input type="text" class="form-control" name="jenis_koperasi" required value="<?= set_value('jenis_koperasi', $k['jenis_koperasi']); ?>">
                                <select name="jenis_koperasi" class="form-control">
                                    <option disabled="" selected="">-- Pilih Jenis --</option>
                                    <option>Simpan Pinjam</option>
                                    <option>Konsumen</option>
                                    <option>Produsen</option>
                                    <option>Pemasaran</option>
                                    <option>Serba Usaha</option>
                                </select>
                                <?= form_error('jenis_koperasi', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required value="<?= set_value('alamat', $k['alamat']); ?>">
                                <?= form_error('alamat', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nama Ketua</label>
                                        <input type="text" class="form-control" name="ketua" required value="<?= set_value('ketua', $k['ketua']); ?>">
                                        <?= form_error('ketua', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. HP Ketua</label>
                                        <input type="text" class="form-control" name="no_hp_ketua" required value="<?= set_value('no_hp_ketua', $k['no_hp_ketua']); ?>">
                                        <?= form_error('no_hp_ketua', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Sekretaris</label>
                                        <input type="text" class="form-control" name="sekretaris" required value="<?= set_value('sekretaris', $k['sekretaris']); ?>">
                                        <?= form_error('sekretaris', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. HP Sekretaris</label>
                                        <input type="text" class="form-control" name="no_hp_sekretaris" required value="<?= set_value('no_hp_sekretaris', $k['no_hp_sekretaris']); ?>">
                                        <?= form_error('no_hp_sekretaris', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Bendahara</label>
                                        <input type="text" class="form-control" name="bendahara" required value="<?= set_value('bendahara', $k['bendahara']); ?>">
                                        <?= form_error('bendahara', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No.HP Bendahara</label>
                                        <input type="text" class="form-control" name="no_hp_bendahara" required value="<?= set_value('no_hp_bendahara', $k['no_hp_bendahara']); ?>">
                                        <?= form_error('no_hp_bendahara', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Manajer / kasir</label>
                                        <input type="text" class="form-control" name="manajer_kasir" required value="<?= set_value('manajer_kasir', $k['manajer_kasir']); ?>">
                                        <?= form_error('manajer_kasir', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. HP Manajer / Kasir</label>
                                        <input type="text" class="form-control" name="no_hp_manajer_kasir" required value="<?= set_value('no_hp_manajer_kasir', $k['no_hp_manajer_kasir']); ?>">
                                        <?= form_error('no_hp_manajer_kasir', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jml Anggota (Laki-laki)</label>
                                        <input type="number" class="form-control" name="jml_anggota_l" required value="<?= set_value('jml_anggota_l', $k['jml_anggota_l']); ?>">
                                        <?= form_error('jml_anggota_l', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jml Anggota (Perempuan)</label>
                                        <input type="number" class="form-control" name="jml_anggota_p" required value="<?= set_value('jml_anggota_p', $k['jml_anggota_p']); ?>">
                                        <?= form_error('jml_anggota_p', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jml Karyawan (Laki-laki)</label>
                                        <input type="number" class="form-control" name="jml_karyawan_l" required value="<?= set_value('jml_karyawan_l', $k['jml_karyawan_l']); ?>">
                                        <?= form_error('jml_karyawan_l', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jml Karyawan (Perempuan)</label>
                                        <input type="number" class="form-control" name="jml_karyawan_p" required value="<?= set_value('jml_karyawan_p', $k['jml_karyawan_p']); ?>">
                                        <?= form_error('jml_karyawan_p', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="text" class="form-control" name="email" id="email" required value="<?= set_value('email', $k['email']); ?>">
                                <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required value="<?= set_value('username', $k['username']); ?>">
                                <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                                <span class="text-danger small" id="dup_username"></span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('koperasi'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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