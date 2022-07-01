


  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $judul ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $judul ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
 <section class="content">

<!-- Default box -->
<?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
   
    <div class="card mb-5">
              <div class="card-header">
              <!-- <a  class="btn btn-primary" href="<?php echo base_url('k_galeri/add'); ?>" >
              <i class="fas fa-plus-circle"></i> Tambah Data
                </a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-galeri">
              <i class="fas fa-plus-circle"></i> Tambah Galeri
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datagaleri" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="10%">Cover Galeri</th>
                    <th width="40%">Judul</th>
                    <th width="19%">Author</th>
                   
                    <th width="18%">Action</th>
                </tr>
                  </thead>
                  <tbody >
                  
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
    </div>
            <!-- /.card -->
    
  
    </div>
  
  <!-- /.card-body -->
  
  <!-- /.card-footer -->

<!-- /.card -->

</section>
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<!-- ./wrapper -->

