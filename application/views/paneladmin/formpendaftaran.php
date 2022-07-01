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


		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Form data Masjid</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>

				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form id="inputform">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Masjid</label>
								<input type="text" class="form-control select2" name="nama" id="nama"
									placeholder="inputkan Nama Masjid">
							</div>
							<!-- /.form-group -->
							<div class="form-group">
								<label>Alamat Masjid</label>
								<textarea id="alamat" name="alamat">
                				Place <em>some</em> <u>text</u> <strong>here</strong>
              					</textarea>
							</div>
							<div class="form-group">
								<label>Struktur Masjid</label>
								<textarea id="struktur" name="struktur">
                				Place <em>some</em> <u>text</u> <strong>here</strong>
              					</textarea>
							</div>
							<!-- /.form-group -->
						</div>
						<!-- /.col -->
						<div class="col-md-6">

						<div class="form-group">
								<label>No HP</label>
								<input type="text" class="form-control select2" name="nohp" id="nphp"
									placeholder="inputkan No Hp Masjid">
							</div>
						<div class="form-group">
								<label>Sejarah Masjid</label>
								<textarea id="sejarah" name="sejarah">
                				Place <em>some</em> <u>text</u> <strong>here</strong>
              					</textarea>
							</div>
							<!-- /.form-group -->
							
							<!-- /.form-group -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->


					<!-- /.row -->
			</div>
			<!-- /.card-body -->
			<div class="card-footer">

				<button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
				</form>
			</div>
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
