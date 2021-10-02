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
                        <li class="breadcrumb-item active">Data Umum Koperasi</li>
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
                            <h3 class="card-title">Data Umum Koperasi</h3>
                            <a class="btn btn-sm btn-primary float-right" href="<?= base_url('tambah-koperasi'); ?>"><i class="fa fa-plus"> </i> Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                
                            <div class="table-responsive">
                            <table id="datatables-user" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>Nama Kopeasi</th>
                                    <th>No. Badan Hukum</th>
                                    <th>Tanggal Badan Hukum</th>
                                    <th>Jenis Koperasi</th>
                                    <th style="text-align:center; width: 230px;">Aksi</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($koperasi as $key) { ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= $key['nama_koperasi']; ?></td>
                                        <td><?= $key['nomor_badan_hukum']; ?></td>
                                        <td><?= $key['tanggal_badan_hukum']; ?></td>
                                        <td><?= $key['jenis_koperasi']; ?></td>
                                        <td style="text-align:center;">
                                            <a href="<?= base_url('detail-koperasi/'.$key['id_koperasi']); ?>" class="btn btn-sm btn-default"><i class="fa fa-list"></i> Detail</a>
                                            <a href="<?= base_url('edit-koperasi/'.$key['id_koperasi']); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $key['id_koperasi']; ?>"><i class="fa fa-trash"></i> Hapus</button>
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
</div>


<?php
foreach ($koperasi as $key) { ?>
    <div class="modal fade" id="modalHapus<?= $key['id_koperasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="<?= base_url('hapus-koperasi/'.$key['id_koperasi']); ?>" method="post">
                    <input type="hidden" name="id_koperasi" value="<?= $key['id_koperasi']; ?>">
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

<?php $this->load->view('template/footer');?>