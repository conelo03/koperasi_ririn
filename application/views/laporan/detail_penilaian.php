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
                        <li class="breadcrumb-item active">Data RAT</li>
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
                            <h3 class="card-title">Data Penilaian Kesehatan</h3>
                            <a class="btn btn-sm btn-primary float-right" href="<?= base_url('cetak-laporan-penilaian/'.$id_penilaian) ?>" target="_blank"><i class="fa fa-print"> </i> Cetak Laporan</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                
                            <div class="table-responsive">
                            <table id="datatables-user" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>Nama Koperasi</th>
                                    <th>Tanggal</th>
                                    <th>Penyelenggaraan RAT</th>
                                    <th>Keanggotaan</th>
                                    <th>Realisasi Anggaran</th>
                                    <th>Kinerja Pengurus</th>
                                    <th>Sarana dan Prasarana</th>
                                    <th>Produktivitas</th>
                                    <th>Kerjasama Usaha</th>
                                    <th>Transaksi Usaha</th>
                                    <th>Nilai</th>
                                    <th>Peringkat</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($pk as $key) { 
                                    $k = $this->db->get_where('Koperasi', ['id_koperasi' => $key['id_koperasi']])->row_array();
                                    ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= $k['nama_koperasi']; ?></td>
                                        <td><?= $key['tanggal']; ?></td>
                                        <td><?= $key['penyelenggaraan_rat']; ?></td>
                                        <td><?= $key['keanggotaan']; ?></td>
                                        <td><?= $key['realisasi_anggaran']; ?></td>
                                        <td><?= $key['kinerja_pengurus']; ?></td>
                                        <td><?= $key['sarana_prasarana']; ?></td>
                                        <td><?= $key['produktivitas']; ?></td>
                                        <td><?= $key['kerjasama_usaha']; ?></td>
                                        <td><?= $key['transaksi_usaha']; ?></td>
                                        <td><?= $key['nilai']; ?></td>
                                        <td><?= $key['peringkat']; ?></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <a class="btn btn-default" href="<?= base_url('laporan-penilaian'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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
foreach ($pk as $key) { ?>
    <div class="modal fade" id="modalHapus<?= $key['id_penilaian_kesehatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="<?= base_url('hapus-penilaian-kesehatan/'.$key['id_penilaian_kesehatan'].'/'.$id_penilaian); ?>" method="post">
                    <input type="hidden" name="id_penilaian_kesehatan" value="<?= $key['id_penilaian_kesehatan']; ?>">
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