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
                        <li class="breadcrumb-item"><a href="#">Laporan hasil RAT & Foto bukti</a></li>
                        <li class="breadcrumb-item active">Upload Laporan hasil RAT & Foto bukti pelaksanaan RAT</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php if(is_koperasi()):?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Form Laporan hasil RAT & Foto bukti pelaksanaan RAT</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="upload-form" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Upload Laporan hasil RAT & Foto bukti pelaksanaan RAT disini</label>
                                <div class="fallback">
                                    <input name="dokumen[]" type="file" class="form-upload dropzone" id="upl-file" multiple />
                                    <?= form_error('dokumen[]', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                             <div class="row align-items-center">
                              <div class="col-sm-12">
                                <div class="progress">
                                  <div id="file-progress-bar" class="progress-bar"></div>
                               </div>
                             </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-sm-12">
                                <div id="uploaded_file"></div>
                             </div>
                            </div>

                        </div>
                    
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                            <button type="submit" class="btn btn-primary" id="upload-file"><i class="fa fa-upload"></i> Upload</button>
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
    <?php endif;?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Laporan hasil RAT & Foto bukti pelaksanaan RAT Yang Diupload</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="upload-form" method="POST">
                        <div class="card-body">
                            <table id="datatables-user" class="table table-hover table-striped">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th>Deskripsi</th>
                                    <th style="text-align:center; width: 200px;">Aksi</th>
                                </thead>
                                <tbody>
                                <?php
                                    $dokumen = $k['dokumen'];
                                    $dokumen = explode('|', $dokumen);
                                    $jml = count($dokumen);
                                    if($k['dokumen'] == null){ ?>
                                    <tr>
                                        <td colspan="3"> File dan foto masih kosong.</td>
                                    
                                    </tr>
                                    <?php }else{
                                    for($i=0; $i<$jml; $i++){?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i+1; ?></td>
                                        <td><?= $dokumen[$i]; ?></td>
                                        <td style="text-align:center;">
                                            <a href="<?= base_url('Rat/download/'.$uri.'/'.$id_penilaian.'/'.$dokumen[$i]);?>" class="btn  btn-sm btn-primary"><i class="fa fa-download"></i> Download</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $i+1; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                <?php }
                                } ?>
                              </tbody>
                            </table>
                        </div>
                        </form>
                    </div>
                    <a class="btn btn-default" href="<?= base_url('detail-rat/'.$id_penilaian); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
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

<?php
    $dokumen = $k['dokumen'];
    $dokumen = explode('|', $dokumen);
    $jml = count($dokumen);

    for($i=0; $i<$jml; $i++){?>
    <div class="modal fade" id="modalHapus<?= $i+1; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('hapus-dokumen'); ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data yang sudah dihapus tidak akan kembali
                    <input type="hidden" name="id_rat" value="<?= $uri; ?>">
                    <input type="hidden" name="id_penilaian" value="<?= $id_penilaian; ?>">
                    <input type="hidden" name="dokumen" value="<?= $dokumen[$i]; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button class="btn btn-danger">Hapus</button>
                  
                </div>
            </div>
            </form>
        </div>
    </div>
<?php }?>
<?php $this->load->view('template/footer');?>