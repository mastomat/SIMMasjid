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
							<div class="row">
								<div class="col-md-12">
									<h5><?php echo !empty($gallery['title'])?$gallery['title']:''; ?></h5>

									<?php if(!empty($gallery['images'])){ ?>
									<div class="gallery-img">
										<?php foreach($gallery['images'] as $imgRow){ ?>
										<div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
											<img src="<?php echo base_url('uploads/images/'.$imgRow['file_name']); ?>">
											<a href="javascript:void(0);" class="badge badge-danger"
												onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
										</div>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								<a href="<?php echo base_url('k_galeri/index'); ?>" class="btn btn-primary">Back to
									List</a>
							</div>
						</div>


					</div>
				</div>
				<!-- /.card-body -->

				<!-- /.card-footer -->
			</div>
        </div>

	</section>
	<!-- /.content -->
</div>
