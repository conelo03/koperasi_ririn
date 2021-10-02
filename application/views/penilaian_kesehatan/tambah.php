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
                        <li class="breadcrumb-item active">Tambah Penilaian Koperasi Berprestasi</li>
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
                            <h3 class="card-title">Form Tambah Penilaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('tambah-penilaian-kesehatan/'.$id_penilaian); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value('tanggal'); ?>" required>
                                <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Koperasi</label>
                                <select name="id_koperasi" id="koperasi" class="form-control">
                                    <option disabled="" selected="">-- Nama Koperasi --</option>
                                    <?php foreach ($koperasi as $key) { ?>
                                        <?php $get_kop = $this->db->get_where('koperasi', ['id_koperasi' => $key['id_koperasi']])->row_array(); ?>
                                        <option value="<?= $key['id_koperasi'] ?>" <?= set_value('id_koperasi') == $key['id_koperasi'] ? 'selected' : '' ?>><?= $get_kop['nama_koperasi'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_koperasi', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Penyelenggaraan RAT</label>
                                <div id="penyelenggaraan_rat">

                                </div>

                                <?= form_error('penyelenggaraan_rat', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Keanggotaan</label>
                                <div id="keanggotaan">

                                </div>

                                <?= form_error('keanggotaan', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Realisasi Anggaran</label>
                                <div id="realisasi_anggaran">

                                </div>

                                <?= form_error('realisasi_anggaran', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Kinerja Pengurus</label>
                                <div id="kinerja_pengurus">

                                </div>

                                <?= form_error('kinerja_pengurus', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Sarana dan Prasarana</label>
                                <div id="sarana_prasarana">

                                </div>

                                <?= form_error('sarana_prasarana', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Produktivitas</label>
                                <div id="produktivitas">

                                </div>

                                <?= form_error('produktivitas', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Kerjasama Usaha</label>
                                <div id="kerjasama_usaha">

                                </div>

                                <?= form_error('kerjasama_usaha', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Transaksi Usaha</label>
                                <div id="transaksi_usaha">

                                </div>

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