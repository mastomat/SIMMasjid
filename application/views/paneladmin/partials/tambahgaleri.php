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

						<form class="form-horizontal" style="padding-left: 10%;  padding-right: 10%"
							enctype="multipart/form-data" action="" method="POST">

							<div class="form-group">
								<label class="col-sm-2 control-label " for="title">Album Title:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Add Album Title" name="Title"
										id="Title"
										value="<?php echo isset($_POST['Title']) ? $_POST['Title'] : (isset($record->title) ? $record->title : ''); ?>">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<img class="featured" id="featured_img"
									<?=isset($record->featured)? 'src="'.base_url().'uploads/gallery/'.$record->featured.'"' :'' ?>>
							</div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label>Upload Featured Images</label>
								<input type="file" name="Featured" id="Featured" onchange="loadFeatured(event)">
								<input type="hidden" class="form-control" name="featured_file" id="old_document"
									value="<?php echo isset($record->featured) ? $record->featured : ''; ?>" />
							</div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label>Upload Gallery Images</label>
							</div>
							<div class="clearfix"></div>

							<?php if(isset($picturelist) && count($picturelist)>0) { ?>
							<table class="table table-striped">
								<tbody class="files">
									<tr>
										<th>Preview</th>
										<th>Image Title</th>
										<th>Action</th>
									</tr>

									<?php    foreach ($picturelist as $key => $picture) {
            if (isset($picture->id) && !empty($picture->image)){ ?>
									<tr>
										<td>
											<span class="preview">
												<img
													src="<?=isset($picture->image)?base_url().'uploads/gallery/thumbs/'.$picture->image:'' ?>">
												<input type="hidden" name="img_name[]"
													value="<?=isset($picture->image)?$picture->image:''?>">
											</span>
										</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="text" placeholder="Enter Image Title"
													name="img_title[]"
													value="<?=isset($picture->title)?$picture->title:''?>" />
											</div>
										</td>
										<td>
											<button class="btn btn-danger remove_uploded">
												<i class="glyphicon glyphicon-trash"></i>
												<span>Delete</span>
											</button>
										</td>
									</tr>

									<?php } } ?>
								</tbody>
							</table>
							<?php } ?>


							<!--  ----------------------------THIS IS FILE UPLOAD PART------------------------- -->
							<base href="<?=base_url()?>">
							<!-- blueimp Gallery styles -->
							<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
							<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
							<link rel="stylesheet"
								href="<?php echo base_url()?>assets/Fileupload/css/jquery.fileupload.css">
							<link rel="stylesheet"
								href="<?php echo base_url()?>assets/Fileupload/css/jquery.fileupload-ui.css">
							<!-- CSS adjustments for browsers with JavaScript disabled -->
							<noscript>
								<link rel="stylesheet"
									href="<?php echo base_url()?>assets/Fileupload/css/jquery.fileupload-noscript.css">
								</noscript>
							<noscript>
								<link rel="stylesheet"
									href="<?php echo base_url()?>assets/Fileupload/css/jquery.fileupload-ui-noscript.css">
								</noscript>

							<!-- The file upload form used as target for the file upload widget -->
							<fieldset id="fileupload" action="<?php echo base_url() ?>ablums/do_upload" method="POST"
								enctype="multipart/form-data">
								<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
								<div class="row fileupload-buttonbar">
									<div class="col-lg-7">
										<!-- The fileinput-button span is used to style the file input field as button -->
										<span class="btn btn-success fileinput-button">
											<i class="glyphicon glyphicon-plus"></i>
											<span>Add files...</span>
											<input type="file" name="userfile" multiple>
										</span>
										<button type="submit" class="btn btn-primary start">
											<i class="glyphicon glyphicon-upload"></i>
											<span>Start upload</span>
										</button>
										<button type="reset" class="btn btn-warning cancel">
											<i class="glyphicon glyphicon-ban-circle"></i>
											<span>Cancel upload</span>
										</button>
										<button type="button" class="btn btn-danger delete">
											<i class="glyphicon glyphicon-trash"></i>
											<span>Delete</span>
										</button>
										<input type="checkbox" class="toggle">
										<!-- The global file processing state -->
										<span class="fileupload-process"></span>
									</div>
									<!-- The global progress state -->
									<div class="col-lg-5 fileupload-progress fade">
										<!-- The global progress bar -->
										<div class="progress progress-striped active" role="progressbar"
											aria-valuemin="0" aria-valuemax="100">
											<div class="progress-bar progress-bar-success" style="width:0%;"></div>
										</div>
										<!-- The extended global progress state -->
										<div class="progress-extended">&nbsp;</div>
									</div>
								</div>
								<!-- The table listing the files available for upload/download -->
								<table role="presentation" class="table table-striped">
									<tbody class="files"></tbody>
								</table>
							</fieldset>
							<!-- The blueimp Gallery widget -->
							<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls"
								data-filter=":even">
								<div class="slides"></div>
								<h3 class="title"></h3>
								<a class="prev">‹</a>
								<a class="next">›</a>
								<a class="close">×</a>
								<a class="play-pause"></a>
								<ol class="indicator"></ol>
							</div>
							<!-- The template to display files available for upload -->
							<script id="template-upload" type="text/x-tmpl">

								{% for (var i=0, file; file=o.files[i]; i++) { %}
  <tr class="template-upload fade">
      <td>
          <span class="preview"></span>
      </td>
      <td>
          <p>{%=file.name%}</p>
          <strong class="error text-danger"></strong>
      </td>
      <td>
          <p class="size">Processing...</p>
          <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
      </td>
      <td>
          {% if (!i && !o.options.autoUpload) { %}
              <button class="btn btn-primary start" disabled>
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start</span>
              </button>
          {% } %}
          {% if (!i) { %}
              <button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button>
          {% } %}
      </td>
  </tr>
{% } %}
</script>
							<!-- The template to display files available for download -->
							<script id="template-download" type="text/x-tmpl">
								{% for (var i=0, file; file=o.files[i]; i++) { %}
<tr class="template-download fade">

      <td>
          <span class="preview">
              {% if (file.thumbnailUrl) { %}
                  <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                  <input type="hidden" name="img_name[]" value="{%=file.name%}" >
              {% } %}
          </span>
      </td>
      <td>
          <div class="form-group">
              {% if (file.url) { %}
                  <input class="form-control" type="text" placeholder="Enter Image Title" name="img_title[]" />
              {% } else { %}
                  <span>{%=file.name%}</span>
              {% } %}
          </div>
          {% if (file.error) { %}
              <div><span class="label label-danger">Error</span> {%=file.error%}</div>
          {% } %}
      </td>
      <td>
          <span class="size">{%=o.formatFileSize(file.size)%}</span>
      </td>
      <td>
          {% if (file.deleteUrl) { %}
              <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                  <i class="glyphicon glyphicon-trash"></i>
                  <span>Delete</span>
              </button>
              <input type="checkbox" name="delete" value="1" class="toggle">
          {% } else { %}
              <button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button>
          {% } %}
      </td>
 </tr>
{% } %}

</script>
							<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/vendor/jquery.ui.widget.js"></script>
							<!-- The Templates plugin is included to render the upload/download listings -->
							<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
							<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
							<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js">
							</script>
							<!-- The Canvas to Blob plugin is included for image resizing functionality -->
							<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js">
							</script>

							<!-- blueimp Gallery script -->
							<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
							<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/jquery.iframe-transport.js"></script>
							<!-- The basic File Upload plugin -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/jquery.fileupload.js"></script>
							<!-- The File Upload processing plugin -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/jquery.fileupload-process.js"></script>
							<!-- The File Upload image preview & resize plugin -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/jquery.fileupload-image.js"></script>
							<!-- The File Upload validation plugin -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/jquery.fileupload-validate.js">
							</script>
							<!-- The File Upload user interface plugin -->
							<script src="<?php echo base_url()?>assets/Fileupload/js/jquery.fileupload-ui.js"></script>


							<script type="text/javascript">
								$(function () {
									'use strict';

									$('#fileupload').fileupload({
										// Uncomment the following to send cross-domain cookies:
										//xhrFields: {withCredentials: true},
										url: "<?=base_url().'albums/do_upload'?>"
									});


									$('#fileupload').addClass('fileupload-processing');
									$.ajax({
										// Uncomment the following to send cross-domain cookies:
										//xhrFields: {withCredentials: true},
										url: $('#fileupload').fileupload('option', 'url'),
										dataType: 'json',
										context: $('#fileupload')[0]
									}).always(function () {
										$(this).removeClass('fileupload-processing');
									}).done(function (result) {
										$(this).fileupload('option', 'done')
											.call(this, $.Event('done'), {
												result: result
											});
									});

								});


								var loadFeatured = function (event) {
									var output = document.getElementById('featured_img');
									output.src = URL.createObjectURL(event.target.files[0]);
								};


								$(".remove_uploded").click(function () {
									$(this).parent().parent().remove();
								});

							</script>



							<div class="form-group">
								<input type="hidden" name="process" value="true">
								<input type="hidden" name="id"
									value="<?php echo (isset($record->id) ? $record->id : ''); ?>">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>

						</form>



						<style>
							.featured {
								height: 200px;
								margin: 10px 5px 0 0;
							}

						</style>
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
