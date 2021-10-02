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
                            <h3 class="card-title">Data Koperasi</h3>
                            <a class="btn btn-sm btn-primary float-right" target="_blank" href="<?= base_url('cetak-laporan-rat/'.$id_penilaian) ?>"><i class="fa fa-print"> </i> Cetak Laporan</a>
                            <?php if(is_koperasi()):?>
                                <a class="btn btn-sm btn-primary float-right" href="<?= base_url('tambah-rat/'.$id_penilaian); ?>"><i class="fa fa-plus"> </i> Tambah Data</a>
                            <?php endif;?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                
                            <div class="table-responsive">
                            <table id="datatables-user" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>Nama Koperasi</th>
                                    <th>Simpanan Pokok</th>
                                    <th>Simpanan Wajib</th>
                                    <th>Cadangan</th>
                                    <th>Simpanan Lainnya</th>
                                    <th>Total Modal Sendiri</th>
                                    <th>Modal Luar</th>
                                    <th>Volume Usaha</th>
                                    <th>Asset</th>
                                    <th>SHU</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($rat as $key) { 
                                    $get_koperasi = $this->db->get_where('koperasi', ['id_koperasi' => $key['id_koperasi']])->row_array();
                                    $total_modal_sendiri = $key['simpanan_pokok']+$key['simpanan_wajib']+$key['cadangan']+$key['simpanan_lainnya']+$key['Cadangan_resiko']+$key['Modal_penyertaan']+$key['Modal_Penyetaraan']+$key['Modal_sumbangan']+$key['shu_belumdibagi']+$key['pendapatan']-$key['biaya'];
                                    $total_asset = $key['kas']+$key['bank']+$key['simpanan_berjangka']+$key['surat_berharga']+$key['pinjaman_diberikan']+$key['penyertaan_dan_aktiva']+$key['pendapatan_diterima']+$key['jmlaktiva_tetap'];
                                    $total_shu = $key['pendapatan']-$key['biaya'];
                                    ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= $get_koperasi['nama_koperasi']; ?></td>
                                        <td><?= number_format($key['simpanan_pokok'], 2, ',', '.'); ?></td>
                                        <td><?= number_format($key['simpanan_wajib'], 2, ',', '.'); ?></td>
                                        <td><?= number_format($key['cadangan'], 2, ',', '.'); ?></td>
                                        <td><?= number_format($key['simpanan_lainnya'], 2, ',', '.'); ?></td>
                                        <td><?= number_format($total_modal_sendiri, 2, ',', '.'); ?></td>
                                        <td><?= number_format($key['modal_luar'], 2, ',', '.'); ?></td>
                                        <td><?= number_format($key['volume_usaha'], 2, ',', '.'); ?></td>
                                        <td><?= number_format($total_asset, 2, ',', '.'); ?></td>
                                        <td><?= number_format($total_shu, 2, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <a class="btn btn-default" href="<?= base_url('laporan-rat'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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
foreach ($rat as $key) { ?>
    <div class="modal fade" id="modalHapus<?= $key['id_rat']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="<?= base_url('hapus-rat/'.$key['id_rat'].'/'.$id_penilaian); ?>" method="post">
                    <input type="hidden" name="id_rat" value="<?= $key['id_rat']; ?>">
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
foreach ($rat as $key) { ?>
    <div class="modal fade" id="modalValidasi<?= $key['id_rat']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin memvalidasi data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data yang sudah divalidasi tidak akan bisa diedit kembali.
                    <form action="<?= base_url('validasi-rat/'.$key['id_rat'].'/'.$id_penilaian); ?>" method="post">
                    <input type="hidden" name="id_rat" value="<?= $key['id_rat']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-success">Validasi</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $this->load->view('template/footer');?>