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
                        <li class="breadcrumb-item"><a href="#">Data RAT</a></li>
                        <li class="breadcrumb-item active">Tambah RAT</li>
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
                            <h3 class="card-title">Form Tambah RAT</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('tambah-rat/'.$id_penilaian); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Koperasi</label>
                                <input type="hidden" class="form-control" name="id_koperasi" value="<?= $koperasi['id_koperasi']; ?>" required>
                                <input type="text" class="form-control" name="" value="<?= $koperasi['nama_koperasi']; ?>" readonly>
                                <?= form_error('id_koperasi', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d')); ?>" required>
                                <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Simpanan Lainnya (Simpanan anggota selain dari simpanan pokok & simpanan wajib) </label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="simpanan_lainnya" value="<?= set_value('simpanan_lainnya');  ?>" required>
                                    <?= form_error('simpanan_lainnya', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Cadangan Umum</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="cadangan" value="<?= set_value('cadangan'); ?>" required>
                                    <?= form_error('cadangan', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Cadangan Resiko</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="Cadangan_resiko" value="<?= set_value('Cadangan_resiko'); ?>" required>
                                    <?= form_error('Cadangan_resiko', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Modal Penyertaan</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="Modal_penyertaan" value="<?= set_value('Modal_penyertaan'); ?>" required>
                                    <?= form_error('Modal_penyertaan', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Modal Disetor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="Modal_Penyetaraan" value="<?= set_value('Modal_Penyetaraan'); ?>" required>
                                    <?= form_error('Modal_Penyetaraan', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Modal Sumbangan</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="Modal_sumbangan" value="<?= set_value('Modal_sumbangan'); ?>" required>
                                    <?= form_error('Modal_sumbangan', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">SHU Belum Dibagi</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="shu_belumdibagi" value="<?= set_value('shu_belumdibagi'); ?>" required>
                                    <?= form_error('shu_belumdibagi', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Modal Luar</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="modal_luar" value="<?= set_value('modal_luar'); ?>" required>
                                    <?= form_error('modal_luar', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Volume Usaha</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="volume_usaha" value="<?= set_value('volume_usaha'); ?>" required>
                                    <?= form_error('volume_usaha', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Pendapatan</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="pendapatan" value="<?= set_value('pendapatan'); ?>" required>
                                    <?= form_error('pendapatan', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Biaya</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="biaya" value="<?= set_value('biaya'); ?>" required>
                                    <?= form_error('biaya', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Kas</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="kas" value="<?= set_value('kas'); ?>" required>
                                    <?= form_error('kas', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Bank</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="bank" value="<?= set_value('bank'); ?>" required>
                                    <?= form_error('bank', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Simpanan Berjangka</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="simpanan_berjangka" value="<?= set_value('simpanan_berjangka'); ?>" required>
                                    <?= form_error('simpanan_berjangka', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Surat-Surat Berharga</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="surat_berharga" value="<?= set_value('surat_berharga'); ?>" required>
                                    <?= form_error('surat_berharga', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Pinjaman yang Diberikan</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="pinjaman_diberikan" value="<?= set_value('pinjaman_diberikan'); ?>" required>
                                    <?= form_error('pinjaman_diberikan', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Penyertaan dan Aktiva Lainnya</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="penyertaan_dan_aktiva" value="<?= set_value('penyertaan_dan_aktiva'); ?>" required>
                                    <?= form_error('penyertaan_dan_aktiva', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Jumlah Aktiva Tetap</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="jmlaktiva_tetap" value="<?= set_value('jmlaktiva_tetap'); ?>" required>
                                    <?= form_error('jmlaktiva_tetap', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Realisasi Anggaran</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" name="realisasi_anggaran" class="form-control" required>
                                    <?= form_error('realisasi_anggaran', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Rencana Anggaran</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" name="rencana_anggaran" class="form-control" required>
                                    <?= form_error('rencana_anggaran', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Transaksi Anggota</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" name="transaksi_anggota" class="form-control" required>
                                    <?= form_error('transaksi_anggota', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Transaksi Koperasi</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" name="transaksi_koperasi" class="form-control" required>
                                    <?= form_error('transaksi_koperasi', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Sarana dan Prasarana</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="sarana_prasarana" class="form-control" required="">
                                        <option disabled="" selected="">- Pilih Kriteria -</option>
                                        <option value="Milik Sendiri" <?= set_value('sarana_prasarana') == 'Milik Sendiri' ? 'selected' : '' ?>>Milik Sendiri</option>
                                        <option value="Sewa / Kontrak" <?= set_value('sarana_prasarana') == 'Sewa / Kontrak' ? 'selected' : '' ?>>Sewa / Kontrak</option>
                                        <option value="Hibah" <?= set_value('sarana_prasarana') == 'Hibah' ? 'selected' : '' ?>>Hibah</option>
                                        <option value="Pinjaman" <?= set_value('sarana_prasarana') == 'Pinjaman' ? 'selected' : '' ?>>Pinjaman</option>
                                        <option value="Numpang" <?= set_value('sarana_prasarana') == 'Numpang' ? 'selected' : '' ?>>Numpang</option>
                                    </select>
                                    <?= form_error('sarana_prasarana', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Kerjasama Usaha</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="kerjasama_usaha" class="form-control" required="">
                                        <option disabled="" selected="">- Pilih Kriteria -</option>
                                        <option value="Lebih dari 5 Kerjasama" <?= set_value('kerjasama_usaha') == 'Lebih dari 5 Kerjasama' ? 'selected' : '' ?>>Lebih dari 5 Kerjasama</option>
                                        <option value="4 Kerjasama" <?= set_value('kerjasama_usaha') == '4 Kerjasama' ? 'selected' : '' ?>>4 Kerjasama</option>
                                        <option value="3 Kerjasama" <?= set_value('kerjasama_usaha') == '3 Kerjasama' ? 'selected' : '' ?>>3 Kerjasama</option>
                                        <option value="1-2 Kerjasama" <?= set_value('kerjasama_usaha') == '1-2 Kerjasama' ? 'selected' : '' ?>>1-2 Kerjasama</option>
                                        <option value="Tidak Ada Kerjasama" <?= set_value('kerjasama_usaha') == 'Tidak Ada Kerjasama' ? 'selected' : '' ?>>Tidak Ada Kerjasama</option>
                                    </select>
                                    <?= form_error('kerjasama_usaha', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Kinerja Pengurus</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="kinerja_pengurus" class="form-control" required="">
                                        <option disabled="" selected="">- Pilih Kriteria -</option>
                                        <option value="Ketujuh item kinerja pengurus dibuat tertulis dan dilaksanakan" <?= set_value('kinerja_pengurus') == 'Ketujuh item kinerja pengurus dibuat tertulis dan dilaksanakan' ? 'selected' : '' ?>>Ketujuh item kinerja pengurus dibuat tertulis dan dilaksanakan</option>

                                        <option value="1 s/d 2 item kinerja pengurus tidak dibuat dan tidak dilaksanakan" <?= set_value('kinerja_pengurus') == '1 s/d 2 item kinerja pengurus tidak dibuat dan tidak dilaksanakan' ? 'selected' : '' ?>>1 s/d 2 item kinerja pengurus tidak dibuat dan tidak dilaksanakan</option>

                                        <option value="3 s/d 4 item kinerja pengurus tidak dibuat dan tidak dilaksanakan" <?= set_value('kinerja_pengurus') == '3 s/d 4 item kinerja pengurus tidak dibuat dan tidak dilaksanakan' ? 'selected' : '' ?>>3 s/d 4 item kinerja pengurus tidak dibuat dan tidak dilaksanakan</option>

                                        <option value="5 s/d 6 item kinerja pengurus tidak dibuat dan tidak dilaksanakan" <?= set_value('kinerja_pengurus') == '5 s/d 6 item kinerja pengurus tidak dibuat dan tidak dilaksanakan' ? 'selected' : '' ?>>5 s/d 6 item kinerja pengurus tidak dibuat dan tidak dilaksanakan</option>

                                        <option value="Ketujuh item kinerja pengurus tidak dibuat dan tidak dilaksanakan" <?= set_value('kinerja_pengurus') == 'Ketujuh item kinerja pengurus tidak dibuat dan tidak dilaksanakan' ? 'selected' : '' ?>>Ketujuh item kinerja pengurus tidak dibuat dan tidak dilaksanakan</option>
                                    </select>
                                    <?= form_error('kinerja_pengurus', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('detail-rat/'.$id_penilaian); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-send"></i> Kirim Data</button>
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