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
                        <li class="breadcrumb-item"><a href="#">Penilaian Koperasi Berprestasi</a></li>
                        <li class="breadcrumb-item active">Edit Penilaian Koperasi Berprestasi</li>
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
                            <h3 class="card-title">Form Edit Penilaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('edit-penilaian-kesehatan/'.$pk['id_penilaian_koperasi'].'/'.$id_penilaian); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= set_value('tanggal', $pk['tanggal']); ?>" required>
                                <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Koperasi</label>
                                <select name="id_koperasi" class="form-control">
                                    <option disabled="" selected="">-- Nama Koperasi --</option>
                                    <?php foreach ($koperasi as $key) { ?>
                                        <?php $get_kop = $this->db->get_where('koperasi', ['id_koperasi' => $key['id_koperasi']])->row_array(); ?>
                                        <option value="<?= $key['id_koperasi'] ?>" <?= set_value('id_koperasi', $pk['id_koperasi']) == $key['id_koperasi'] ? 'selected' : '' ?>><?= $get_kop['nama_koperasi'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_koperasi', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Penyelenggaraan RAT</label>
                                <select name="penyelenggaraan_rat" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('penyelenggaraan_rat', $pk['penyelenggaraan_rat']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('penyelenggaraan_rat', $pk['penyelenggaraan_rat']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('penyelenggaraan_rat', $pk['penyelenggaraan_rat']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('penyelenggaraan_rat', $pk['penyelenggaraan_rat']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('penyelenggaraan_rat', $pk['penyelenggaraan_rat']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('penyelenggaraan_rat', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Keanggotaan</label>
                                <select name="keanggotaan" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('keanggotaan', $pk['keanggotaan']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('keanggotaan', $pk['keanggotaan']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('keanggotaan', $pk['keanggotaan']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('keanggotaan', $pk['keanggotaan']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('keanggotaan', $pk['keanggotaan']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('keanggotaan', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Realisasi Anggaran</label>
                                <select name="realisasi_anggaran" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('realisasi_anggaran', $pk['realisasi_anggaran']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('realisasi_anggaran', $pk['realisasi_anggaran']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('realisasi_anggaran', $pk['realisasi_anggaran']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('realisasi_anggaran', $pk['realisasi_anggaran']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('realisasi_anggaran', $pk['realisasi_anggaran']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('realisasi_anggaran', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Kinerja Pengurus</label>
                                <select name="kinerja_pengurus" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('kinerja_pengurus', $pk['kinerja_pengurus']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('kinerja_pengurus', $pk['kinerja_pengurus']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('kinerja_pengurus', $pk['kinerja_pengurus']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('kinerja_pengurus', $pk['kinerja_pengurus']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('kinerja_pengurus', $pk['kinerja_pengurus']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('kinerja_pengurus', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Sarana dan Prasaran</label>
                                <select name="sarana_prasarana" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('sarana_prasarana', $pk['sarana_prasarana']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('sarana_prasarana', $pk['sarana_prasarana']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('sarana_prasarana', $pk['sarana_prasarana']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('sarana_prasarana', $pk['sarana_prasarana']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('sarana_prasarana', $pk['sarana_prasarana']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('sarana_prasarana', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Produtivitas</label>
                                <select name="produktivitas" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('produktivitas', $pk['produktivitas']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('produktivitas', $pk['produktivitas']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('produktivitas', $pk['produktivitas']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('produktivitas', $pk['produktivitas']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('produktivitas', $pk['produktivitas']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('produktivitas', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Kerjasama Usaha</label>
                                <select name="kerjasama_usaha" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('kerjasama_usaha', $pk['kerjasama_usaha']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('kerjasama_usaha', $pk['kerjasama_usaha']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('kerjasama_usaha', $pk['kerjasama_usaha']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('kerjasama_usaha', $pk['kerjasama_usaha']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('kerjasama_usaha', $pk['kerjasama_usaha']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('kerjasama_usaha', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Transaksi Usaha</label>
                                <select name="transaksi_usaha" class="form-control">
                                    <option disabled="" selected="">-- Pilih Nilai --</option>
                                    <option value="5" <?= set_value('transaksi_usaha', $pk['transaksi_usaha']) == '5' ? 'selected' : '' ?>>Sangat Baik</option>
                                    <option value="4" <?= set_value('transaksi_usaha', $pk['transaksi_usaha']) == '4' ? 'selected' : '' ?>>Baik</option>
                                    <option value="3" <?= set_value('transaksi_usaha', $pk['transaksi_usaha']) == '3' ? 'selected' : '' ?>>Cukup</option>
                                    <option value="2" <?= set_value('transaksi_usaha', $pk['transaksi_usaha']) == '2' ? 'selected' : '' ?>>Kurang Baik</option>
                                    <option value="1" <?= set_value('transaksi_usaha', $pk['transaksi_usaha']) == '1' ? 'selected' : '' ?>>Tidak Baik</option>
                                </select>
                                <?= form_error('transaksi_usaha', '<span class="text-danger small">', '</span>'); ?>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('detail-penilaian-kesehatan/'.$id_penilaian); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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