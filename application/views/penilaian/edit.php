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
                        <li class="breadcrumb-item"><a href="#">Data Penilaian</a></li>
                        <li class="breadcrumb-item active">Edit Penilaian</li>
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
                        <form action="<?= base_url('edit-penilaian/'.$p['id_penilaian']); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" value="<?= set_value('tanggal_mulai', $p['tanggal_mulai']); ?>" required>
                                <?= form_error('tanggal_mulai', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Tanggal Selsai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" value="<?= set_value('tanggal_selesai', $p['tanggal_selesai']); ?>" required>
                                <?= form_error('tanggal_selesai', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Status</label>
                                <select class="form-control" name="status" value="<?= set_value('status'); ?>" required>
                                    <option>- Pilih Role -</option>
                                    <option value="Buka" <?= set_value('status', $p['status']) == "Buka" ? 'selected' : '';?>>Buka</option>
                                    <option value="Tutup" <?= set_value('status', $p['status']) == "Tutup" ? 'selected' : '';?>>Tutup</option>
                                </select>
                                <?= form_error('status', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('penilaian'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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