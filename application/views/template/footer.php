      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.5
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
     <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url(); ?>assets/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toastr/toastr.min.js'?>"></script>
    <script src="<?= base_url(); ?>assets/vendor/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript">
        jQuery(document).on('submit', '#upload-form', function(e){
            jQuery("#chk-error").html('');
            e.preventDefault();
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();         
                    xhr.upload.addEventListener("progress", function(element) {
                        if (element.lengthComputable) {
                            var percentComplete = parseInt((element.loaded / element.total) * 100);
                            $("#file-progress-bar").width(percentComplete + '%');
                            $("#file-progress-bar").html(percentComplete+'%');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "<?= base_url("Rat/upload_dokumen/".$uri); ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                dataType:'json',
 
                beforeSend: function(){
                    $("#file-progress-bar").width('0%');
                },
 
                success: function(json){
                    if(json == 'success'){
                        $('#upload-form')[0].reset();
                        $('#uploaded_file').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                    }else if(json == 'failed'){
                        $('#uploaded_file').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                    }
                    setTimeout('auto_reload()',1000)
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                  console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });

        function auto_reload()
        {
            window.location.reload(); //your page location
        }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)      
      $("#koperasi").change(function(){ // Ketika user mengganti atau memilih data provinsi
        $("#penyelenggaraan_rat").hide(); // Sembunyikan dulu combobox kota nya
        $("#keanggotaan").hide(); // Sembunyikan dulu combobox kota nya
        $("#realisasi_anggaran").hide();
        $("#kinerja_pengurus").hide();
        $("#sarana_prasarana").hide();
        $("#produktivitas").hide();
        $("#kerjasama_usaha").hide();
        $("#transaksi_usaha").hide();
        $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?= base_url("Penilaian_kesehatan/get_nilai"); ?>", // Isi dengan url/path file php yang dituju
          data: {
            tanggal : $("#tanggal").val(), 
            id_koperasi : $("#koperasi").val()
          }, 
          async : true,
          dataType: "JSON",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ // Ketika proses pengiriman berhasil
            // set isi dari combobox kota
            // lalu munculkan kembali combobox kotanya
            $("#penyelenggaraan_rat").html(response.penyelenggaraan_rat).show();
            $("#keanggotaan").html(response.keanggotaan).show();
            $("#realisasi_anggaran").html(response.realisasi_anggaran).show();
            $("#kinerja_pengurus").html(response.kinerja_pengurus).show();
            $("#sarana_prasarana").html(response.sarana_prasarana).show();
            $("#produktivitas").html(response.produktivitas).show();
            $("#kerjasama_usaha").html(response.kerjasama_usaha).show();
            $("#transaksi_usaha").html(response.transaksi_usaha).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      });
    });
  </script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script>

      $(document).ready( function () {
          $('#datatables-user').DataTable({
            "ordering": false,
          });
          $('#datatables-department').DataTable({
            "ordering": false,
          });
          $('#datatables-kategori').DataTable({
            "ordering": false,
          });
          $('#datepicker').datepicker({
            autoclose:true
          });
          $('#datepicker2').datepicker({
            autoclose:true
          });
        } );
      </script>
      <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
            toastr.success('Data berhasil disimpan.')
        </script>
      <?php elseif($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
            toastr.error('Data gagal disimpan.')
        </script>
      <?php elseif($this->session->flashdata('msg')=='edit'):?>
        <script type="text/javascript">
            toastr.info('Data berhasil diubah.')
        </script>
      <?php elseif($this->session->flashdata('msg')=='gagal-edit'):?>
        <script type="text/javascript">
            toastr.error('Data gagal diubah.')
        </script>
      <?php elseif($this->session->flashdata('msg')=='hapus'):?>
        <script type="text/javascript">
            toastr.success('Data berhasil dihapus.')
        </script>
      <?php elseif($this->session->flashdata('msg')=='gagal-hapus'):?>
        <script type="text/javascript">
            toastr.error('Data gagal dihapus.')
        </script>
      <?php elseif($this->session->flashdata('msg')=='data-kosong'):?>
        <script type="text/javascript">
            toastr.error('Data kosong! Harap diisi terlebih dahulu.')
        </script>
      <?php endif; ?>
  </body>
</html>
