
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
<?php foreach($user as $u){ ?>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url(). 'Gaji/update'; ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Karyawan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Karyawan" name="data1" value="<?php echo $u->Nama ?>">
                  </div>
                 

                      <div class="form-group">
                        <label>Divisi</label>
                        <select class="form-control" name="data2">
                          <option>Marketing</option>
                          <option>HRD</option>
                          <option>Engineering</option>
                          <option>Finance</option>
                          <option>Operasional</option>
                        </select>
                      </div>

                       <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan NIP" name="data3" value="<?php echo $u->Jabatan ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total_Kehadiran</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Teknisi" name="data4" value="<?php echo $u->Total_Kehadiran ?>">
                  </div>

                                    <div class="form-group">
                    <label for="exampleInputEmail1">Gaji pokok</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Teknisi" name="data5" value="<?php echo $u->Gapok ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Bonus</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Teknisi" name="data6" value="<?php echo $u->Bonus ?>">
                  </div>
                                 
                 


<input type="hidden" name="id" value="<?php echo $u->ID ?>">



<!--                   <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
               <!--    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div> -->
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                <?php } ?>
            </div>
      <div class="container-fluid">
            <div class="card">
             <!--  <div class="card-header">
                <h3 class="card-title">Data Engineering</h3>
                <a href="<?= site_url('Engineering/Create_Data_engineering') ?>"><button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah Data</button></a>
              </div> -->
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

