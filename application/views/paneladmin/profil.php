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
				<h3 class="card-title">Form Setting Profils</h3>

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
						<div class="col-md-12">

							<div class="card">
								<div class="card-header p-2">
									<ul class="nav nav-pills">
										<li class="nav-item"><a class="nav-link active" href="#activity"
												data-toggle="tab">Nama Pengguna</a></li>
										<li class="nav-item"><a class="nav-link" href="#timeline"
												data-toggle="tab">Password</a></li>
										
									</ul>
								</div>
								<div class="card-body">
									<div class="tab-content">
										<div class="active tab-pane" id="activity">
											<form id="editnama">
												<div class="form-group row">
													<label for="inputName" class="col-sm-2 col-form-label">Name</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="nama" name="nama"
															placeholder="Name" value="<?php echo $namauser ?>">
													</div>
												</div>


												<div class="form-group row">
													<div class="offset-sm-2 col-sm-10">
														<button type="submit" class="btn btn-danger"
															id="btn-simpannama">Submit</button>
													</div>
												</div>
											</form>


										</div>

										<div class="tab-pane" id="timeline">

										<form id="editpw">
												<div class="form-group row">
													<label for="inputName" class="col-sm-2 col-form-label">Password</label>
													<div class="col-sm-10">
														<input type="password" class="form-control" id="password" name="password"
														">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputName" class="col-sm-2 col-form-label">Konfirmasi Password</label>
													<div class="col-sm-10">
														<input type="password" class="form-control" id="confirm_password" name="confirm_password"
														">
													</div>
												</div>


												<div class="form-group row">
													<div class="offset-sm-2 col-sm-10">
														<button type="submit" class="btn btn-danger"
															id="btn-simpannama">Submit</button>
													</div>
												</div>
											</form>

										</div>

										

									</div>

								</div>
							</div>
						</div>
						<!-- /.col -->

						<!-- /.row -->


						<!-- /.row -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">


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
