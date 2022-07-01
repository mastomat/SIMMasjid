<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard Admin</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-default">
									<div class="card-header">
										<h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like
												look</small></h3>
									</div>
									<div class="card-body">
										<div id="actions" class="row">
											<div class="col-lg-6">
												<div class="btn-group w-100">
													<span class="btn btn-success col fileinput-button">
														<i class="fas fa-plus"></i>
														<span>Add files</span>
													</span>
													<button type="submit" class="btn btn-primary col start">
														<i class="fas fa-upload"></i>
														<span>Start upload</span>
													</button>
													<button type="reset" class="btn btn-warning col cancel">
														<i class="fas fa-times-circle"></i>
														<span>Cancel upload</span>
													</button>
												</div>
											</div>
											<div class="col-lg-6 d-flex align-items-center">
												<div class="fileupload-process w-100">
													<div id="total-progress" class="progress progress-striped active"
														role="progressbar" aria-valuemin="0" aria-valuemax="100"
														aria-valuenow="0">
														<div class="progress-bar progress-bar-success" style="width:0%;"
															data-dz-uploadprogress></div>
													</div>
												</div>
											</div>
										</div>
										<div class="table table-striped files" id="previews">
											<div id="template" class="row mt-2">
												<div class="col d-flex align-items-center">
													<p class="tags" data-dz-tags></p>
													<input type="text" name="tags" />
												</div>
												<div class="col-auto">
													<span class="preview"><img src="data:," alt=""
															data-dz-thumbnail /></span>
												</div>
												<div class="col d-flex align-items-center">
													<p class="mb-0">
														<span class="lead" data-dz-name></span>
														(<span data-dz-size></span>)
													</p>
													<strong class="error text-danger" data-dz-errormessage></strong>
												</div>

												<div class="col-4 d-flex align-items-center">
													<div class="progress progress-striped active w-100"
														role="progressbar" aria-valuemin="0" aria-valuemax="100"
														aria-valuenow="0">
														<div class="progress-bar progress-bar-success" style="width:0%;"
															data-dz-uploadprogress></div>
													</div>
												</div>
												<div class="col-auto d-flex align-items-center">
													<div class="btn-group">
														<button class="btn btn-primary start">
															<i class="fas fa-upload"></i>
															<span>Start</span>
														</button>
														<button data-dz-remove class="btn btn-warning cancel">
															<i class="fas fa-times-circle"></i>
															<span>Cancel</span>
														</button>
														<button data-dz-remove class="btn btn-danger delete">
															<i class="fas fa-trash"></i>
															<span>Delete</span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /.card-body -->
									<div class="card-footer">
										Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for
										more examples and information about the plugin.
									</div>
								</div>
								<!-- /.card -->
							</div>
						</div>
					</div>


				</div>
			</div>
			<!-- /.card-body -->

			<!-- /.card-footer -->
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->
