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
                        <li class="breadcrumb-item active">Detail Data Umum Koperasi Koperasi</li>
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
                            <h3 class="card-title">Form Detail Data Umum Koperasi</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Nama Koperasi</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['nama_koperasi']?> </h5>      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Nomor Badan Hukum</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['nomor_badan_hukum']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Tanggal Badan Hukum</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['tanggal_badan_hukum']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Jenis Koperasi</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['jenis_koperasi']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Alamat</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['alamat']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Nama Ketua</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['ketua']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>No. HP Ketua</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['no_hp_ketua']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Sekretaris</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['sekretaris']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>No. HP Sekretaris</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['no_hp_sekretaris']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Bendahara</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['bendahara']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>No. HP Bendahara</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['no_hp_bendahara']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Manajer / Kasir</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['manajer_kasir']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>No. HP Manajer / Kasir</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['no_hp_manajer_kasir']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Jumlah Anggota (Laki-Laki)</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['jml_anggota_l']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Jumlah Anggota (Perempuan)</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['jml_anggota_p']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Jumlah Karyawan (Laki-Laki)</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['jml_karyawan_l']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Jumlah Anggota (Perempuan)</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['jml_karyawan_p']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Email</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['email']?> </h5> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Username</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>: <?= $k['username']?> </h5> 
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="<?= base_url('koperasi'); ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
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