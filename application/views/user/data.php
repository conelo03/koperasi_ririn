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
                        <li class="breadcrumb-item active">Data User</li>
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
                            <h3 class="card-title">Data User</h3>
                            <a class="btn btn-sm btn-primary float-right" href="<?= base_url('tambah-user'); ?>"><i class="fa fa-user-plus"> </i> Tambah User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                
                            <div class="table-responsive">
                            <table id="datatables-user" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th style="text-align:center; width: 200px;">Aksi</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($user as $key) { ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= $key['nama']; ?></td>
                                        <td><?= $key['username']; ?></td>
                                        <td><?= $key['role']; ?></td>
                                        <td style="text-align:center;">
                                            <a href="<?= base_url('edit-user/'.$key['id_user']); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $key['id_user']; ?>"><i class="fa fa-trash"></i> Hapus</button>
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
foreach ($user as $key) { ?>
    <div class="modal fade" id="modalHapus<?= $key['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="<?= base_url('hapus-user/'.$key['id_user']); ?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $key['id_user']; ?>">
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