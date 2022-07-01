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


		<div class="card card-solid mb-5">
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-lg-12">


						<div class="container">
							<h5><?php echo $title; ?></h5>
							<hr>

							<!-- Display status message -->
							<?php if(!empty($error_msg)){ ?>
							<div class="col-xs-12">
								<div class="alert alert-danger"><?php echo $error_msg; ?></div>
							</div>
							<?php } ?>

							<div class="row">
								<div class="col-md-12">
									<form method="post" action="" enctype="multipart/form-data">
										<div class="form-group">
											<label>Title:</label>
											<input type="text" name="title" class="form-control select2"
												placeholder="Enter title"
												value="<?php echo !empty($gallery['title'])?$gallery['title']:''; ?>">
											<?php echo form_error('title','<p class="help-block text-danger">','</p>'); ?>
										</div>
										<div class="form-group">
											<label for="exampleInputFile">Gambar Foto</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" name="images[]" id="exampleInputFile" multiple>
													<label class="custom-file-label" for="exampleInputFile">Choose
														file</label>
												</div>
												<div class="input-group-append">
													<span class="input-group-text">Upload</span>
												</div>
											</div>
										</div>
										<div class="form-group">

											<?php if(!empty($gallery['images'])){ ?>
											<div class="gallery-img">
												<div class="container">
													<div class="card card-success m-3 bg-dark">
														<div class="card-body">
															<div class="row">
																<?php foreach($gallery['images'] as $imgRow){ ?>

																<div class="col-md-12 col-lg-6 col-xl-4">
																	<div class="card mb-2">
																		<a href="<?php echo base_url('uploads/gallery/'.$imgRow['file_name']); ?>"
																			data-toggle="lightbox"
																			data-title="<?php echo  $imgRow['file_name']; ?>"
																			data-gallery="gallery">
																			<img class="card-img-top"
																				src="<?php echo base_url('uploads/gallery/'.$imgRow['file_name']); ?>"
																				alt="Dist Photo 3">
																		</a>


																		<a href="javascript:void(0);"
																			class="badge badge-danger"
																			onclick="deleteImage('<?php echo $imgRow['id_foto']; ?>')"><i
																				class="fa fa-trash nav-icon"></i>
																			deletde</a>

																	</div>
																</div>

																<?php } ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>

										</div>

                                        

										<a href="<?php echo base_url('k_galeri/index'); ?>"
											class="btn btn-secondary mb-5">Back</a>
										<input type="hidden" name="id"
											value="<?php echo !empty($gallery['id'])?$gallery['id']:''; ?>">
										<input type="submit" name="imgSubmit" class="btn btn-success mb-5 "
											value="SUBMIT">
									</form>
								</div>
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
<script>
	function deleteImage(id) {
		var result = confirm("Are you sure to delete?");
		if (result) {
			$.post("<?php echo base_url('k_galeri/deleteImage'); ?>", {
				id: id
			}, function (resp) {
				if (resp == 'ok') {
					$('#imgb_' + id).remove();
					alert('The image has been removed from the gallery');
				} else {
					alert('Some problem occurred, please try again.');
				}
			});
		}
	}

</script>
