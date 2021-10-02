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
                        <li class="breadcrumb-item active">Data Anggota</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Anggota</h3>
                            <a class="btn btn-sm btn-primary float-right" href="<?= base_url('tambah-anggota'); ?>"><i class="fa fa-plus"> </i> Tambah Anggota</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                
                            <div class="table-responsive">
                            <table id="datatables-user" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>No. Anggota</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Simpanan Pokok</th>
                                    <th>Status</th>
                                    <th style="text-align:center;">Aksi</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($anggota as $key) { ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= $key['no_anggota']; ?></td>
                                        <td><?= $key['nik']; ?></td>
                                        <td><?= $key['nama']; ?></td>
                                        <td><?= $key['jenis_kelamin']; ?></td>
                                        <td><?= $key['no_telp']; ?></td>
                                        <td><?= $key['alamat']; ?></td>
                                        <td><?= $key['tanggal_masuk']; ?></td>
                                        <td><?= 'Rp '.number_format($key['simpanan_pokok'], 2, ',', '.'); ?></td>
                                        <td><?= $key['status'] == 0 ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                        <td style="text-align:center;">
                                            <a href="<?= base_url('simpanan-anggota/'.$key['id_anggota']); ?>" class="btn btn-sm btn-default"><i class="fa fa-list"></i> SW</a>
                                            <a href="<?= base_url('edit-anggota/'.$key['id_anggota']); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $key['id_anggota']; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                            <?php if($key['status'] == 0):?>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalStatus<?= $key['id_anggota']; ?>"><i class="fa fa-check"></i> Aktifkan</button>
                                            <?php else:?>
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalStatus<?= $key['id_anggota']; ?>"><i class="fa fa-times"></i> Non-Aktifkan</button>
                                            <?php endif;?>
                                            
                                        </td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Simpanan Wajib dan Simpanan Pokok</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                
                            <div class="table-responsive">
                            <table id="datatables-department" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>Tahun</th>
                                    <th>Simpanan Pokok</th>
                                    <th>Simpanan Wajib</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($simpanan as $key) { ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= date('Y', strtotime($key['tanggal_simpan'])); ?></td>
                                        <td><?= 'Rp '.number_format($key['pokok'], 2, ',', '.'); ?></td>
                                        <td><?= 'Rp '.number_format($key['besar'], 2, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>


<?php
foreach ($anggota as $key) { ?>
    <div class="modal fade" id="modalHapus<?= $key['id_anggota']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data yang sudah dihapus tidak akan kembali
                    <form action="<?= base_url('hapus-anggota/'.$key['id_anggota']); ?>" method="post">
                    <input type="hidden" name="id_anggota" value="<?= $key['id_anggota']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
foreach ($anggota as $key) { ?>
    <div class="modal fade" id="modalStatus<?= $key['id_anggota']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $key['status'] == 0 ? 'Anda ingin mengaktifkan user ini?': 'Anda ingin menonaktifkan user ini?'; ?>
                    <form action="<?= base_url('status-anggota/'.$key['id_anggota']); ?>" method="post">
                    <input type="hidden" name="status" value="<?= $key['status'] == 0 ? '1': '0'; ?>">
                    <input type="hidden" name="id_anggota" value="<?= $key['id_anggota']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-info">Konfirmasi</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $this->load->view('template/footer');?>